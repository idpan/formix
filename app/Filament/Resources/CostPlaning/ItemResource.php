<?php

namespace App\Filament\Resources\CostPlaning;

use App\Filament\Resources\CostPlaning\ItemResource\Pages;
use App\Filament\Resources\CostPlaning\ItemResource\RelationManagers;
use App\Models\CostPlaning\Item;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;

class ItemResource extends Resource
{

    public static function canViewAny(): bool
    {
        return Filament::auth()->user()?->hasAnyRole(['admin', 'estimator']);
    }
    protected static ?string $model = Item::class;

    protected static ?string $navigationLabel = 'Bahan/Upah/Alat';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Cost Planning';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Item')
                    ->required()
                    ->maxLength(100),

                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'material' => 'Material',
                        'labor' => 'Upah Pekerja',
                        'equipment' => 'Alat Konstruksi',
                    ])
                    ->required(),

                TextInput::make('unit')
                    ->label('Satuan')
                    ->required()
                    ->maxLength(10),

                TextInput::make('unit_price')
                    ->label('Harga Satuan')
                    ->numeric()
                    ->prefix('Rp')
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama')->searchable(),
                TextColumn::make('category')->label('Kategori')
                    ->searchable()
                    ->colors([
                        'primary' => 'material',
                        'warning' => 'labor',
                        'info' => 'equipment',
                    ])
                    ->badge(),
                TextColumn::make('unit')->label('Satuan'),
                TextColumn::make('unit_price')->label('Harga')->money('IDR', true),

            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'material' => 'Material',
                        'labor' => 'Upah Pekerja',
                        'equipment' => 'Alat Konstruksi',
                    ]),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
