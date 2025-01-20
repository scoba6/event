<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    /** @use HasFactory<\Database\Factories\TableFactory> */
    use HasFactory, SoftDeletes, Userstamps, LogsActivity;

    protected $fillable = [
        'namtab',
        'numtab',
        'clatab',
    ];

    /**
     * Get the events that owns the Table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function events(): BelongsTo
    {
        return $this->belongsTo(Evenement::class, 'evenement_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'text']);
    }



}
