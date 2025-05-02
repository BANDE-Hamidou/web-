<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Piece extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'cout',
        'quantite',
        'intervention_id'

    ];


    public function typePieces()
    {
        return $this->belongsToMany(Type_piece::class, 'piece_type', 'piece_id', 'type_piece_id')
                    ->withTimestamps(); // Si vous utilisez les timestamps
    }

    public function intervention()
    {
        return $this->belongsTo(Intervention::class);
    }

}
