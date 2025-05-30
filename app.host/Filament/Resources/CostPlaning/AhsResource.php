<?php

namespace App\Filament\Resources\CostPlaning;

use App\Filament\Resources\CostPlaning\AhsResource\Pages;
use App\Filament\Resources\CostPlaning\AhsResource\RelationManagers;
use App\Filament\Resources\CostPlaning\AhsResource\RelationManagers\AhsDetailsRelationManager;
use App\Models\CostPlaning\Ahs;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;

class AhsResource extends Resource
{
    public static function canViewAny(): bool
    {
        return Filament::auth()->user()?->hasAnyRole(['admin', 'estimator']);
    }
    protected static ?string $model = Ahs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Cost Planning';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('unit'),
                Select::make('ahs_group_id')
                    ->relationship('group', 'name')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group.name')->searchable()->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('unit'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AhsDetailsRelationManager::class
        ];
    }
public function hasCombinedRelationManagerTabsWithContent(): bool
{
    return true;
}
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAhs::route('/'),
            'create' => Pages\CreateAhs::route('/create'),
            'edit' => Pages\EditAhs::route('/{record}/edit'),
        ];
    }
}
