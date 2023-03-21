<?php

declare(strict_types=1);

namespace App\Filament\Resources\NgoResource\Pages;

use App\Filament\Resources\NgoResource;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Pages\CreateRecord;
use Filament\Pages\Actions;
class CreateNgo extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = NgoResource::class;
    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
    public static function getTranslatableLocales(): array
    {
        return config('filament-spatie-laravel-translatable-plugin.default_locales');
    }
}
