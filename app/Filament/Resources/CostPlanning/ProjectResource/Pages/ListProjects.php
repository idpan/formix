<?php

namespace App\Filament\Resources\CostPlanning\ProjectResource\Pages;

use App\Filament\Resources\CostPlanning\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjects extends ListRecords
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
