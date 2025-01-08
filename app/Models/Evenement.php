<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    /** @use HasFactory<\Database\Factories\EvenementFactory> */
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = [
        'customer_id',
        'libevn',
        'desevn',
        'strevn',
        'endevn',
        'typevn',
    ];

    /**
     * Get the customer that owns the Evenement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    /**
     * Get the prestation that owns the Evenement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prestation(): BelongsTo
    {
        return $this->belongsTo(Prestation::class, 'typevn', 'id');
    }

    /**
     * Get all of the table for the Evenement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tables(): HasMany
    {
        return $this->hasMany(Table::class);
    }

    /**
     * Get all of the invites for the Evenement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invites(): HasMany
    {
        return $this->hasMany(Invite::class);
    }
}
