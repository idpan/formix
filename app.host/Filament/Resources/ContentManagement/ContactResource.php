<?php

namespace App\Filament\Resources\ContentManagement;

use App\Filament\Resources\ContentManagement\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Address;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Components\HasManyRepeater;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;

class ContactResource extends Resource
{
    public static function canViewAny(): bool
    {
        return Filament::auth()->user()?->hasAnyRole(['admin', 'editor']);
    }
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Content Management';
    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('phone')->required()->tel(),
            TextInput::make('email')->required()->email(),

            Repeater::make('addresses')
                ->relationship('addresses')
                ->schema([
                    TextInput::make('name')->required(),
                    Textarea::make('address')->required(),
                ])
                ->label('Daftar Alamat'),

            Repeater::make('socialMedia')
                ->relationship('socialMedia')
                ->schema([
                    TextInput::make('username')->required(),
                    TextInput::make('platform')->required(),
                    TextInput::make('url')->required()->url(),
                ])
                ->label('Akun Media Sosial'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
