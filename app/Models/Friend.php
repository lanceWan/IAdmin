<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends';

    public function user()
    {
    	return $this->hasOne('App\User','id','friend_id');
    }
}
