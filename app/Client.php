<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['nom','prenom','date_de_naissance','adresse','telephone','email','commentaire'];

    public function abonnements()
    {
        return $this->hasMany(Abonnement::class);
    }
}
