<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaryGroup extends Model
{
    use HasFactory;
    use Translatable;

    protected $translatable = ['name'];
}
