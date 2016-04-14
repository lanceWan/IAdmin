<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    public function relation()
    {
    	return $this->belongsToMany('App\Models\Menu','menu_relation','id','id')->withTimestamps();
    }
}
