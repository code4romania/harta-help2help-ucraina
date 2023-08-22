<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

trait Translatable
{
    use HasTranslations;

    public function scopeWhereTranslatable(Builder $query, string $column, string $value, string $boolean = 'and'): Builder
    {
        $locale = app()->getLocale();
        $value = Str::lower($value);

        if (Str::contains($column, '.')) {
            $clause = $boolean === 'and' ? 'whereHas' : 'orWhereHas';

            return $query->{$clause}($column, function ($query) use ($column, $value, $locale, $boolean) {
                $query->whereRaw("LOWER({$column}->\"$.{$locale}\") LIKE ?", ["%{$value}%"], $boolean);
            });
        }

        return $query->whereRaw("LOWER({$column}->\"$.{$locale}\") LIKE ?", ["%{$value}%"], $boolean);
    }

    public function scopeOrWhereTranslatable(Builder $query, string $column, string $value): Builder
    {
        return $query->whereTranslatable($column, $value, 'or');
    }
}
