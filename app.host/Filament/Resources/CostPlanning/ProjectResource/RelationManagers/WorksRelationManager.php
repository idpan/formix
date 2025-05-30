<?php

namespace App\Filament\Resources\CostPlanning\ProjectResource\RelationManagers;

use App\Models\CostPlaning\Ahs;
use App\Models\CostPlaning\ProjectWork;
use App\Models\CostPlaning\ProjectWorkItem;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorksRelationManager extends RelationManager
{
    protected static string $relationship = 'works';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('ahs_name')
                    ->options(Ahs::all()->pluck('name', 'id'))
                    ->required()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ahs_name')
            ->columns([
                Tables\Columns\TextColumn::make('ahs_name'),
                Tables\Columns\TextColumn::make('volume'),
                Tables\Columns\TextColumn::make('unit_price')->numeric()->prefix('Rp'),
                Tables\Columns\TextColumn::make('subtotal')->numeric()->prefix('Rp'),
            ])
            ->filters([
                //
            ])
            ->headerActions([

                Action::make('tambahDariAhs')
                    ->label('Tambah AHS')
                    ->form([
                        Select::make('ahs_id')
                            ->label('pilih AHS')
                            ->options(Ahs::all()->pluck('name', 'id'))
                            ->required(),
                        TextInput::make('volume')->required()
                    ])

                    ->action(function (array $data, $record, $livewire) {
                        // dd($this->getOwnerRecord()->id);
                        $projectId = $livewire->ownerRecord->id;
                        // $projectId = $this->getOwnerRecord()->id;
                        $ahs = Ahs::with(['items' => function ($query) {
                            $query->withPivot('coefficient');
                        }])->findOrFail($data['ahs_id']);

                        $ahsUnitPrice = $ahs->items->sum(function ($item) {
                            return $item->pivot->coefficient * $item->unit_price;
                        });
                        $projectWork = ProjectWork::create([
                            'project_id' => $projectId,
                            'ahs_name' => $ahs->name,
                            'unit' => $ahs->unit,
                            'volume' => $data['volume'],
                            'unit_price' => $ahsUnitPrice,
                            'subtotal' => $ahsUnitPrice * $data['volume']
                        ]);

                        foreach ($ahs->items as $item) {
                            ProjectWorkItem::create([
                                'project_work_id' => $projectWork->id,
                                'item_name' => $item->name,
                                'unit' => $item->unit,
                                'coefficient' => $item->pivot->coefficient,
                                'unit_price' => $item->unit_price,
                            ]);
                        }
                    })
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
