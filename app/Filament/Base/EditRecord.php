<?php

declare(strict_types=1);

namespace App\Filament\Base;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord as EditRecordMain;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditRecord extends EditRecordMain
{
    use Translatable;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }

    public static function getTranslatableLocales(): array
    {
        return config('filament-spatie-laravel-translatable-plugin.default_locales');
    }
}
