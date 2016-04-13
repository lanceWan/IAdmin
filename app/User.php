<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Bican\Roles\Traits\HasRoleAndPermission;
use Illuminate\Auth\Passwords\CanResetPassword;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\ActionAttributeTrait;
class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{
    use Authenticatable, CanResetPassword, HasRoleAndPermission,ActionAttributeTrait;

    private $action;

    function __construct()
    {
        $this->action = config('admin.global.role.action');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
