<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facture extends Model
{
    use HasFactory;

    protected $casts = [
        'annee' => 'date',
    ];

    protected $fillable =[
        'marque',
        'couleur',
        'annee',
        'prix',
        'libelle',
    ];

    public function intervention():HasMany
    {
        return $this->hasMany(Intervention::class);
    }
}
