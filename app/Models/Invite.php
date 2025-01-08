<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invite extends Model
{
    /** @use HasFactory<\Database\Factories\InviteFactory> */
    use HasFactory, SoftDeletes, Userstamps;

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


}
