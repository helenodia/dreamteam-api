<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ["name", "rating"];

    public function team()
    {
    	return $this->belongsTo(Team::class);
    }
}
