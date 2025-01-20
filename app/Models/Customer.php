<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory, Userstamps, SoftDeletes, LogsActivity;

    protected $fillable = [
        'nomcli',
        'telcli',
        'maicli',
        'adrcli',
    ];

    public function events()
    {
        return $this->hasMany(Evenement::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([  'nomcli',
        'telcli',
        'maicli',
        'adrcli']);
    }


}
