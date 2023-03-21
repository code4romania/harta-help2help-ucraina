<?php

declare(strict_types=1);

namespace App\Filament\Resources\NgoResource\Pages;

use App\Filament\Base\CreateRecord;
use App\Filament\Resources\NgoResource;

class CreateNgo extends CreateRecord
{
    protected static string $resource = NgoResource::class;
}
