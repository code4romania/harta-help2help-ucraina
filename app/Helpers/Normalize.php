<?php

declare(strict_types=1);

namespace App\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Normalize
{
    /**
     * Strip tags and normalize the string to lowercase ascii.
     *
     * @param  null|string $string
     * @return string
     */
    public static function string(?string $string): string
    {
        $string ??= '';

        return Str::of(html_entity_decode($string))
            ->stripTags()
            ->lower()
            ->ascii()
            ->value();
    }

    public static function collection(Collection $input): Collection
    {
        return $input->map(fn (?string $value) => self::string($value));
    }
}
