<?php

declare(strict_types=1);

namespace App\Filament\Resources\NgoResource\Pages;

use App\Filament\Base\EditRecord;
use App\Filament\Resources\NgoResource;

class EditNgo extends EditRecord
{
    protected static string $resource = NgoResource::class;

    protected static ?string $title = 'Editeaza organizatie';
}
