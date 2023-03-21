<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class InterventionDomains extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
    ];
    protected $translatable =['name'];

}
