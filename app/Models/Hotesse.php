<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotesse extends Model
{
    /** @use HasFactory<\Database\Factories\HotesseFactory> */
    use HasFactory, SoftDeletes, Userstamps, LogsActivity;


    protected $fillable = [
        'nomhot',
        'telhot',
        'maihot',
        'imghot',
        'adrhot',
        'deshot'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'text']);
    }

}
