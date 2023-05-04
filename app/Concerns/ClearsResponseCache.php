<?php

declare(strict_types=1);

namespace App\Concerns;

use Spatie\ResponseCache\Facades\ResponseCache;

trait ClearsResponseCache
{
    public static function bootClearsResponseCache()
    {
        self::created(fn () => self::clearResponseCache());
        self::updated(fn () => self::clearResponseCache());
        self::deleted(fn () => self::clearResponseCache());
    }

    private static function clearResponseCache(): void
    {
        ResponseCache::clear();
    }
}
