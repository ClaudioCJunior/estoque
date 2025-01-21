<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $fillable = [
        'name',
        'address',
    ];

     public function clients()
     {
         return $this->hasMany(EstablishmentClient::class);
     }
}
