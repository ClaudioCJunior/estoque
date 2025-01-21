<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Establishmentclient extends Model
{
    protected $fillable = [
        'establishment_id',
        'name',
        'cpf',
        'email',
        'phone',
        'address',
    ];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
