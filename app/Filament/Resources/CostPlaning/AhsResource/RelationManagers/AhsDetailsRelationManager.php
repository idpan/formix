<?php

namespace App\Filament\Resources\CostPlaning\AhsResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AhsDetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('item_id')
                    ->relationship('items', 'name')
                    // ->searchable('name', 'category')
                    ->required(),
                TextInput::make('coefficient')
                    ->numeric()
                    ->placeholder('Contoh: 12.5')
                    ->helperText('Gunakan titik (.) sebagai pemisah desimal, contoh: 12.5')



            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([

                TextColumn::make('items.name')
                    ->label('Item')
                    ->searchable(),
                TextColumn::make('items.unit'),
                TextColumn::make('items.category')
                    ->label('Kategori')
                    ->searchable(),
                // TextColumn::make('coefficient')
                //     ->label('Koefisien & Satuan')
                //     ->getStateUsing(function ($record) {
                //         return $record->coefficient . ' ' . ($record->items->unit ?? '-');
                //     }),
                TextColumn::make('coefficient')

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
