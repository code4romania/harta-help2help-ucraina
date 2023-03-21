<?php

declare(strict_types=1);

namespace App\Filament\Resources\InterventionDomainsResource\Pages;

use App\Filament\Resources\InterventionDomainsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInterventionDomains extends ListRecords
{
    protected static string $resource = InterventionDomainsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
