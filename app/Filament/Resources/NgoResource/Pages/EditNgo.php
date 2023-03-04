<?php

declare(strict_types=1);

namespace App\Filament\Resources\NgoResource\Pages;

use App\Filament\Resources\NgoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNgo extends EditRecord
{
    protected static string $resource = NgoResource::class;

    protected static ?string $title = 'Editeaza organizatie';

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
