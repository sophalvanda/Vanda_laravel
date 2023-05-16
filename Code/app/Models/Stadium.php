<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stadium extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'ZoneA',
        'ZoneB',
    ];
    public function Event():HasMany
    {
        return $this->hasMany(Event::class);
    }
}
