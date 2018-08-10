<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegunaan extends Model
{
    //
	//protected $guarded = ['id'];

    public function room() {
        return $this->hasMany('App\Room');
    }
}
