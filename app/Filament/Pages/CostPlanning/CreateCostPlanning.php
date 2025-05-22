<?php

namespace App\Filament\Pages\CostPlanning;

use App\Models\CostPlaning\Ahs;
use App\Models\CostPlaning\Project;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Facades\Filament;

class CreateCostPlanning extends Page implements HasForms
{
    use InteractsWithForms;

    public static function shouldRegisterNavigation(): bool
    {
        return Filament::auth()->user()?->hasAnyRole(['admin', 'estimator']);
    }
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.cost-planning.create-cost-planning';
    protected static ?string $navigationGroup = 'Cost Planning';

    public array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')->label('Nama Proyek')->required(),
            TextInput::make('client_name')->label('Nama Klien'),

            Repeater::make('works')
                ->schema([
                    Select::make('ahs_id')
                        ->options(Ahs::pluck('name', 'id'))
                        ->searchable()->required(),

                    TextInput::make('volume')
                        ->numeric()->default(1)->required(),
                ])
                ->defaultItems(1)
                ->reorderable(),
        ];
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $project = Project::create([
            'name' => $data['name'],
            'client_name' => $data['client_name'],
        ]);

        foreach ($data['works'] as $work) {
            $ahs = Ahs::with('details.item')->find($work['ahs_id']);
            $volume = $work['volume'];
            $unit_price = $ahs->details->sum(fn($d) => $d->coefficient * $d->item->unit_price);

            $workRecord = $project->works()->create([
                'ahs_name' => $ahs->name,
                'unit' => $ahs->unit,
                'volume' => $volume,
                'unit_price' => $unit_price,
                'subtotal' => $unit_price * $volume,
            ]);

            foreach ($ahs->details as $detail) {
                $subtotal = $detail->coefficient * $detail->item->unit_price * $volume;

                $workRecord->items()->create([
                    'item_name' => $detail->item->name,
                    'unit' => $detail->item->unit,
                    'unit_price' => $detail->item->unit_price,
                    'coefficient' => $detail->coefficient,
                    'subtotal' => $subtotal,
                    'category' => $detail->item->category,
                ]);
            }
        }

        Notification::make()->success()->title('Cost Planning berhasil disimpan')->send();
        $this->redirect(Project::class); // redirect jika ada halaman resource-nya
    }
}
