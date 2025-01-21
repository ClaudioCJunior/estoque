<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstablishmentUser extends Model
{
    // Defina os campos que podem ser preenchidos em massa
    protected $fillable = [
        'user_id',
        'establishment_id',
    ];

    // Defina o relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Defina o relacionamento com o modelo Establishment
    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}