<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\ClearsResponseCache;
use App\Concerns\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterventionDomain extends Model
{
    use ClearsResponseCache;
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'name',
        'icon',
    ];

    protected array $translatable = [
        'name',
    ];
}
