<?php

namespace App\Filament\Resources\CostPlaning\ProjectDraftResource\Pages;

use App\Filament\Resources\CostPlaning\ProjectDraftResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectDrafts extends ListRecords
{
    protected static string $resource = ProjectDraftResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
