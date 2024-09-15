<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Type_piece extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom',
        'quantite',
       
    ];

    public function pieces()
    {
        return $this->belongsToMany(Piece::class, 'piece_type', 'idtypepiece', 'idpiece');
    }
}
