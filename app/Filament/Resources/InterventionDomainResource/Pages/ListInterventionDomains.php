<?php

declare(strict_types=1);

namespace App\Filament\Resources\InterventionDomainResource\Pages;

use App\Filament\Resources\InterventionDomainResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInterventionDomains extends ListRecords
{
    protected static string $resource = InterventionDomainResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
