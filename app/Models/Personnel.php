<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
    ];

    public function service():BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function interventions()
{
    return $this->belongsToMany(Intervention::class, 'personnels_interventions', 'idpersonnel', 'idintervention');
}


}
