<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    # latravel tiene protecciones para evitar sql injection
    protected $fillable = [ # solo estos campos son rellenables
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [ # estos campos no se van a mostrar
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    # aqui estan los casteos y esto quiere decir que el password debe estar incriptado
    #castear siginifica obligar a que un campo sea de un tipo de dato
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    # relacion 1 a muchos 
    # cuando devuelva los usuario devolvea los comentarios
    @return \Illuminate\Database\Eloquent\Relations\HasMany
    public function comments(): Hasmany
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

}
