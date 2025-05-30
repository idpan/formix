<?php

namespace App\Filament\Resources\CostPlaning;

use App\Models\CostPlaning\Ahs;
use App\Models\CostPlaning\ProjectDraft;

use App\Models\CostPlaning\AhsGroup;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class ProjectDraftResource extends Resource
{
    protected static ?string $model = ProjectDraft::class;
    // protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Cost Planning';
    protected static ?string $navigationLabel = 'Draft';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)->schema([
                // Kolom kiri
                Forms\Components\Section::make('Data Proyek')->schema([
                    Forms\Components\TextInput::make('project_name')->required()->label('Nama Proyek'),
                    Forms\Components\TextInput::make('client_name')->label('Nama Klien'),
                    Forms\Components\TextInput::make('address')->label('Alamat'),
                    Forms\Components\Repeater::make('ahs_items')
                        ->label('Daftar AHS')
                        ->schema([
                            Forms\Components\Select::make('ahs_group_id')
                                ->label('Group AHS')
                                ->options(fn() => AhsGroup::pluck('name', 'id'))
                                ->reactive()
                                ->required(),

                            Forms\Components\Select::make('ahs_id')
                                ->label('AHS')
                                ->options(
                                    fn(callable $get) =>
                                    $get('ahs_group_id')
                                        ? Ahs::where('ahs_group_id', $get('ahs_group_id'))->pluck('name', 'id')
                                        : []
                                )
                                ->required()
                                ->reactive(),

                            Forms\Components\TextInput::make('volume')->numeric()->label('Volume')->required()->reactive(),

                            Forms\Components\TextInput::make('unit_price')
                                ->label('Harga Satuan')
                                ->numeric()
                                ->required()
                                ->reactive()
                            // ->disabled(),
                        ])
                        ->columns(4)
                        ->addActionLabel('Tambah AHS')
                        ->required(),

                ]),

                // Kolom kanan
                Forms\Components\Section::make('Preview RAB')->schema([
                    Forms\Components\ViewField::make('ahs_items')
                        ->view('filament.project-draft.preview-rab')->disabled(),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('project_name')->label('Nama Proyek'),
            Tables\Columns\TextColumn::make('client_name')->label('Klien'),
            Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->date(),
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\CostPlaning\ProjectDraftResource\Pages\ListProjectDrafts::route('/'),
            'create' => \App\Filament\Resources\CostPlaning\ProjectDraftResource\Pages\CreateProjectDraft::route('/create'),
            'edit' => \App\Filament\Resources\CostPlaning\ProjectDraftResource\Pages\EditProjectDraft::route('/{record}/edit'),
        ];
    }
}
