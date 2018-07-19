<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    public function packs()
    {
        return $this->hasMany(Pack::class);
    }
}
