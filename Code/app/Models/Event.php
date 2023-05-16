<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'numberOfSeats',
        'date',
        'stadium_id',
        'sport_id',
    ];
    public function Matching(): HasMany
    {
        return $this->hasMany(Matching::class);
    }
    public function Stadium(): BelongsTo
    {
        return $this->belongsTo(Stadium::class);
    }
    public function Sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }
    public function Booking(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
