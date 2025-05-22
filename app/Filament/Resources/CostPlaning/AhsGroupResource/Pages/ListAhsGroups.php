<?php

namespace App\Filament\Resources\CostPlaning\AhsGroupResource\Pages;

use App\Filament\Resources\CostPlaning\AhsGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAhsGroups extends ListRecords
{
    protected static string $resource = AhsGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
