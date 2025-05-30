<?php

namespace App\Filament\Resources\CostPlaning\AhsDetailResource\Pages;

use App\Filament\Resources\CostPlaning\AhsDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAhsDetails extends ListRecords
{
    protected static string $resource = AhsDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
