<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function Event(): HasOne
    {
        return $this->hasOne(Event::class);
    }
}
