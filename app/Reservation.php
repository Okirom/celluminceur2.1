<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }
}
