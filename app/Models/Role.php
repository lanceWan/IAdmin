<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActionAttributeTrait;
class Role extends Model
{
	use ActionAttributeTrait;
    protected $table = 'roles';

    protected $fillable = ['name','slug','description','level','status'];

    private $action;

    function __construct()
    {
    	$this->action = config('admin.global.role.action');
    }

    public function permission()
    {
    	return $this->belongsToMany('App\Models\Permission','permission_role','role_id','permission_id')->withTimestamps();
    }
}
