<?php

namespace App\Filament\Resources\ContentManagement;

use App\Models\Page;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\ContentManagement\PageResource\Pages;
use Filament\Actions\EditAction;
// use Filament\Facades\Filament;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction as ActionsEditAction;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Facades\Filament;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Content Management';
    public static function canViewAny(): bool
    {
        return Filament::auth()->user()?->hasAnyRole(['admin', 'editor']);
    }

    // protected static ?int $navigationSort = 2;
    // protected static ?string $navigationParentItem = 'Pages';
    // public static function shouldRegisterNavigation(): bool
    // {
    //     return false;
    // }
    public static function form(Form $form): Form
    {
        $formFields = [
            Repeater::make('sections')
                ->relationship('sections')
                ->schema([

                    RichEditor::make('header')
                        ->disableAllToolbarButtons()
                        ->enableToolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'strike',
                            'undo',
                            'redo'
                        ]),
                    RichEditor::make('paragraph')
                        ->disableAllToolbarButtons()
                        ->enableToolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'strike',
                            'undo',
                            'redo'
                        ]),

                ])
                ->itemLabel(
                    fn($state) => ($state['name'] ?? 'Unnamed') . ' - section'
                )
                ->addable(false)
                ->deletable(false)
                ->columnSpanFull()


        ];
        return $form->schema([
            Tabs::make('Edit Page')
                ->tabs([
                    Tab::make('Konten')->schema([
                        Repeater::make('sections')
                            ->relationship('sections')
                            ->schema([
                                TextInput::make('name')->disabled(),
                                TextInput::make('header'),
                                Textarea::make('paragraph'),
                            ])
                            ->deletable(false)
                            ->addable(false)
                            ->columnSpanFull()
                    ]),
                    Tab::make('metadata')->schema([
                        TextInput::make('meta_title')->label('Meta Title'),
                        Textarea::make('meta_description')->label('Meta Description'),
                        TextInput::make('meta_keywords')->label('Meta Keywords'),
                        TextInput::make('meta_author')->label('Meta Author'),
                        TextInput::make('meta_locale')->label('Meta Locale')->default('id_ID'),
                        TextInput::make('meta_region')->label('Meta Region')->default('ID'),
                    ])
                ])
        ]);
    }


    // public static function shouldRegisterNavigation(): bool
    // {
    //     return false; // agar tidak tampil default di sidebar
    // }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->sortable()->searchable(),
        ])
            ->actions([

                ActionsEditAction::make(),
            ])
            ->bulkActions([

                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return false;
    }
}
