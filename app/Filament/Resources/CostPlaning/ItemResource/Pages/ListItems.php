<?php

namespace App\Filament\Resources\CostPlaning\ItemResource\Pages;

use App\Filament\Resources\CostPlaning\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItems extends ListRecords
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
