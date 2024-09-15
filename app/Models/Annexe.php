<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Annexe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vehicule() 
    {
         return $this->belongsTo(Vehicule::class);

    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
