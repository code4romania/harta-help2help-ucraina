<?php

declare(strict_types=1);

namespace App\Enums;

enum ServiceApplicationType: string
{
    case Online = 'online';
    case Phone = 'by_phone';

    case Physical = 'physical';

    public static function names(): array
    {
        return collect(self::cases())
            ->pluck('name')
            ->all();
    }

    public static function values(): array
    {
        return collect(self::cases())
            ->pluck('value')
            ->all();
    }

    public static function selectable(): array
    {
        return collect(self::cases())
            ->pluck('name', 'value')
            ->all();
    }
}
