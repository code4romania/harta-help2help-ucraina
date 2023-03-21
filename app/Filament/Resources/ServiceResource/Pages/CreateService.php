<?php

declare(strict_types=1);

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Base\CreateRecord;
use App\Filament\Resources\ServiceResource;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;
}
