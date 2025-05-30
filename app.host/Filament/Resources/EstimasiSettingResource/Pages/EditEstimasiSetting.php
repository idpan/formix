<?php

namespace App\Filament\Resources\EstimasiSettingResource\Pages;

use App\Filament\Resources\EstimasiSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstimasiSetting extends EditRecord
{
    protected static string $resource = EstimasiSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
