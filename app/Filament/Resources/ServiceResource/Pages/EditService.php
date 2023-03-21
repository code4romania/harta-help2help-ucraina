<?php

declare(strict_types=1);

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Base\EditRecord;
use App\Filament\Resources\ServiceResource;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;
}
