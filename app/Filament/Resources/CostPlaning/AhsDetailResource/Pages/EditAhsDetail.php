<?php

namespace App\Filament\Resources\CostPlaning\AhsDetailResource\Pages;

use App\Filament\Resources\CostPlaning\AhsDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAhsDetail extends EditRecord
{
    protected static string $resource = AhsDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
