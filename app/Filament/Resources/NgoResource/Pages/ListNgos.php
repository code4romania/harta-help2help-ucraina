<?php

declare(strict_types=1);

namespace App\Filament\Resources\NgoResource\Pages;

use App\Filament\Resources\NgoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNgos extends ListRecords
{
    protected static string $resource = NgoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
