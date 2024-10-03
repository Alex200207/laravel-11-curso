<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    # esto elimina todo sql injection pero no es recomendable hacerlo en produccion
    protected $guarded =['*'];
    
}

# relacion de vuelta comentario a usuario
# esta es una relacion biglongsTo quiere decir que un comentario pertenece a un usuario
@return \Illuminate\Database\Eloquent\Relations\BelongsTo

public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
