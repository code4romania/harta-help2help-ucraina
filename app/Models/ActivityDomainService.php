<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityDomainService extends Model
{
    use HasFactory;
    use Translatable;

    protected $translatable = [];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function activityDomain(): BelongsTo
    {
        return $this->belongsTo(ActivityDomain::class);
    }
}
