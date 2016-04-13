<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\ActionAttributeTrait;
class Permission extends Model
{
	use ActionAttributeTrait;
	
    protected $table = 'permissions';

    protected $fillable = ['name','slug','description','model','status'];

    private $action;

    function __construct()
    {
    	$this->action = config('admin.global.permission.action');
    }

    public function role()
    {
    	return $this->belongsToMany('App\Models\Role');
    }

}
