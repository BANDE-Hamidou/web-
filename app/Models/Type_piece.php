<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type_piece extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom',
       
    ];

    public function pieces(): BelongsToMany
    {
        return $this->belongsToMany(Piece::class, 'piece_type', 'type_piece_id', 'piece_id');
                    
    }
}
