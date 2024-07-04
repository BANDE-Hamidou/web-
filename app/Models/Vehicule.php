<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicule extends Model
{
    use HasFactory;
    protected $fillable = [
        'marque',
        'couleur',
        'annee',
        'prix',
        'image',
        'detail',
        // 'annexe_id',
    ];

    public function annexe():BelongsTo
    {
        return $this->belongsTo(Annexe::class, Client::class);
    }

    public function intervention():HasMany
    {
        return $this->hasMany(Intervention::class);
    }
}

