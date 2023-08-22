<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable as ScoutSearchable;

trait Searchable
{
    use ScoutSearchable {
        search as scoutSearch;
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return config('scout.prefix') . app()->getLocale() . '_' . $this->getTable();
    }

    /**
     * Perform a search against the model's indexed data.
     *
     * @param  string                 $query
     * @param  \Closure               $callback
     * @return \Laravel\Scout\Builder
     */
    public static function search($query = '', $callback = null)
    {
        $query = Str::of($query)
            ->lower()
            ->ascii()
            ->value();

        return self::scoutSearch($query, $callback);
    }

    public static function searchAndFilter(?string $terms, ?array $filters)
    {
        if (filled($terms)) {
            return self::search($terms)
                ->query(fn ($query) => $query->filter($filters));
        }

        return self::query()
            ->filter($filters);
    }

    public function scopeFilter(Builder $query, ?array $filters): Builder
    {
        return $query->filterQuery(
            collect($filters)
                ->filter()
                ->all()
        );
    }
}
