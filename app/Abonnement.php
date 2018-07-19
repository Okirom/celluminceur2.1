<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{

    protected $fillable=['prix_reel','nom'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
