<?php

declare(strict_types=1);

namespace App\Filament\Base;

use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord as CreateRecordMain;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateRecord extends CreateRecordMain
{
    use Translatable;

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
