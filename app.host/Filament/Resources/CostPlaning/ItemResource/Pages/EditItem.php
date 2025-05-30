<?php

namespace App\Filament\Resources\CostPlaning\ItemResource\Pages;

use App\Filament\Resources\CostPlaning\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItem extends EditRecord
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
