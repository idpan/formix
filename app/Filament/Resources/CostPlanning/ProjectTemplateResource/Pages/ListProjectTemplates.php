<?php

namespace App\Filament\Resources\CostPlanning\ProjectTemplateResource\Pages;

use App\Filament\Resources\CostPlanning\ProjectTemplateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectTemplates extends ListRecords
{
    protected static string $resource = ProjectTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
