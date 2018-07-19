<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    public function abonnements()
    {
        return $this->hasMany(Abonnement::class);
    }
    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }
}
