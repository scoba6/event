<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Hotesse extends Model
{
    /** @use HasFactory<\Database\Factories\HotesseFactory> */
    use HasFactory, SoftDeletes, Userstamps;


    protected $fillable = [
        'nomhot',
        'telhot',
        'maihot',
        'imghot',
        'adrhot',
        'deshot'
    ];

}
