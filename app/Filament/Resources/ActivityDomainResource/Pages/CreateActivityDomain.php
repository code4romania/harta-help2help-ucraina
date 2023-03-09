<?php

declare(strict_types=1);

namespace App\Filament\Resources\ActivityDomainResource\Pages;

use App\Filament\Resources\ActivityDomainResource;
use Filament\Resources\Pages\CreateRecord;

class CreateActivityDomain extends CreateRecord
{
    protected static string $resource = ActivityDomainResource::class;
}
