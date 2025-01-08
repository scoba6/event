<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory, Userstamps, SoftDeletes;

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


}
