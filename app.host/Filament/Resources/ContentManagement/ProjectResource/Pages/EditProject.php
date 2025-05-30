<?php

namespace App\Filament\Resources\ContentManagement\ProjectResource\Pages;

use App\Filament\Resources\ContentManagement\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
