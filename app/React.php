<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class React extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function idea(){
        return $this->belongsTo('App\Idea');
    }
}
