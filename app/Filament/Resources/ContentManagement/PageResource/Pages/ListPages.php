<?php

namespace App\Filament\Resources\ContentManagement\PageResource\Pages;

use App\Filament\Resources\ContentManagement\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    // // protected function getHeaderActions(): array
    // // {
    // //     return [
    // //         Actions\CreateAction::make(),
    // //     ];
    // }
}
