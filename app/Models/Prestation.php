<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Prestation extends Model
{
    /** @use HasFactory<\Database\Factories\PrestationFactory> */
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = [
        'libprs',
        'desprs',
        'is_active',
    ];
}
