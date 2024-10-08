<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeintervention extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];

    public function interventions()
{
    return $this->belongsToMany(Intervention::class, 'intervention_types', 'idtypeintervention', 'idintervention');
}

    
}
