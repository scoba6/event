<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestataire extends Model
{
    /** @use HasFactory<\Database\Factories\PrestataireFactory> */
    use HasFactory, Userstamps, SoftDeletes, LogsActivity;

    protected $fillable = [
        'nompre',
        'maipre',
        'telpre',
        'adrpre',
        'despre'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'text']);
    }
}
