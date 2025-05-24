<?php

namespace App\Filament\Resources\EstimasiSettingResource\Pages;

use App\Filament\Resources\EstimasiSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstimasiSettings extends ListRecords
{
    protected static string $resource = EstimasiSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
