<?php

namespace App\Filament\Resources\CostPlaning\AhsResource\Pages;

use App\Filament\Resources\CostPlaning\AhsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAhs extends EditRecord
{
    protected static string $resource = AhsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
