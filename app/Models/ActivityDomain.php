<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\ClearsResponseCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ActivityDomain extends Model
{
    use ClearsResponseCache;
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name',
    ];

    protected $translatable = ['name'];
}
