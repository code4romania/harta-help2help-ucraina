<?php

declare(strict_types=1);

namespace App\Filament\Resources\ActivityDomainResource\Pages;

use App\Filament\Base\CreateRecord;
use App\Filament\Resources\ActivityDomainResource;

class CreateActivityDomain extends CreateRecord
{
    protected static string $resource = ActivityDomainResource::class;
}
