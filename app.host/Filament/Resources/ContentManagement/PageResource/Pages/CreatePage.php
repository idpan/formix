<?php

namespace App\Filament\Resources\ContentManagement\PageResource\Pages;

use App\Filament\Resources\ContentManagement\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;
}
