<?php

declare(strict_types=1);

namespace App\Filament\Resources\BeneficiaryGroupResource\Pages;

use App\Filament\Resources\BeneficiaryGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBeneficiaryGroups extends ListRecords
{
    protected static string $resource = BeneficiaryGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
