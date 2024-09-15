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
        'quantite'

    ];


    public function typePieces()
{
    return $this->belongsToMany(Type_piece::class, 'piece_type', 'idpiece', 'idtypepiece');
}

}
