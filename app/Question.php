<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     public function questionair()
    {
        return $this->belongsTo('App\Questionair');
    }
}
