<?php

declare(strict_types=1);

namespace App\Filament\Resources\BeneficiaryGroupResource\Pages;

use App\Filament\Base\CreateRecord;
use App\Filament\Resources\BeneficiaryGroupResource;

class CreateBeneficiaryGroup extends CreateRecord
{
    protected static string $resource = BeneficiaryGroupResource::class;
}
