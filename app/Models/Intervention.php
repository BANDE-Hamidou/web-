<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Intervention extends Model
{
    use HasFactory;

    protected $fillable = [
        "libelle",
        "date",
    ];

    public function vehicule():BelongsTo
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function facture():BelongsTo
    {
        return $this->belongsTo(Facture::class);
    }

    public function personnels()
{
    return $this->belongsToMany(Personnel::class, 'personnels_interventions', 'idintervention', 'idpersonnel');
}

public function typeInterventions()
{
    return $this->belongsToMany(TypeIntervention::class, 'intervention_types', 'idintervention', 'idtypeintervention');
}

}
