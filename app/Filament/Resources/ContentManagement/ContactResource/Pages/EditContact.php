<?php

namespace App\Filament\Resources\ContentManagement\ContactResource\Pages;

use App\Filament\Resources\ContentManagement\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
