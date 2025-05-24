<?php

namespace App\Filament\Resources\CostPlanning;

use App\Filament\Resources\CostPlanning\ProjectTemplateResource\Pages;
use App\Filament\Resources\CostPlanning\ProjectTemplateResource\RelationManagers;
use App\Models\CostPlaning\ProjectTemplate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectTemplateResource extends Resource
{
    protected static ?string $model = ProjectTemplate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Pages\ListProjectTemplates::route('/'),
            'create' => Pages\CreateProjectTemplate::route('/create'),
            'edit' => Pages\EditProjectTemplate::route('/{record}/edit'),
        ];
    }
}
