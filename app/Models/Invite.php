<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invite extends Model
{
    /** @use HasFactory<\Database\Factories\InviteFactory> */
    use HasFactory, SoftDeletes, Userstamps, LogsActivity;

    protected $fillable = [
        'evenement_id',
        'table_id',
        'naminv',
        'clainv',
        'preinv'
    ];

    /**
     * Get the event that owns the Invite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Evenement::class, 'evenement_id', 'id');
    }

    /**
     * Get the table that owns the Invite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class, 'table_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'text']);
    }


}
