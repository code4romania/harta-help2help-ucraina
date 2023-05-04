<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\ClearsResponseCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use ClearsResponseCache;
    use HasFactory;

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }
}
