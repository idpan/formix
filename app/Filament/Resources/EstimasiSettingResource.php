<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstimasiSettingResource\Pages;
use App\Models\EstimasiSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class EstimasiSettingResource extends Resource
{
    protected static ?string $model = EstimasiSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Konfigurasi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('form_header')->label('Judul Form'),
            Forms\Components\Textarea::make('catatan')->label('Catatan di bawah form'),
            Forms\Components\TextInput::make('harga_per_meter')->label('Harga per Meter (Rp)')->numeric()->required(),
            Forms\Components\Toggle::make('aktif')->label('Aktifkan Form Estimasi'),
            Forms\Components\Textarea::make('pesan_template')
                ->label('Template Pesan')
                ->rows(4)
                ->helperText('Gunakan {{total}} dan {{luas}} sebagai placeholder.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('harga_per_meter'),
            Tables\Columns\IconColumn::make('aktif')->boolean(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEstimasiSettings::route('/'),
            'edit' => Pages\EditEstimasiSetting::route('/{record}/edit'),
        ];
    }
}
