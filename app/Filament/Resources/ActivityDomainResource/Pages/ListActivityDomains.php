<?php

namespace App\Filament\Resources\ActivityDomainResource\Pages;

use App\Filament\Resources\ActivityDomainResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActivityDomains extends ListRecords
{
    protected static string $resource = ActivityDomainResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
