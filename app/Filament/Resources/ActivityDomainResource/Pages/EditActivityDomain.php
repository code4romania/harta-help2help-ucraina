<?php

declare(strict_types=1);

namespace App\Filament\Resources\ActivityDomainResource\Pages;

use App\Filament\Resources\ActivityDomainResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActivityDomain extends EditRecord
{
    protected static string $resource = ActivityDomainResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
