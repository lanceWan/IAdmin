<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use UserRepository;
use PermissionRepository;
use RoleRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPermission:'.config('admin.permissions.user.list'), ['only' => ['index', 'ajaxIndex']]);
        $this->middleware('checkPermission:'.config('admin.permissions.user.create'), ['only' => ['create', 'store']]);
        $this->middleware('checkPermission:'.config('admin.permissions.user.edit'), ['only' => ['edit', 'update']]);
        $this->middleware('checkPermission:'.config('admin.global.user.action').',true', ['only' => ['mark']]);
        $this->middleware('checkPermission:'.config('admin.permissions.user.destory'), ['only' => ['destroy']]);
        $this->middleware('checkPermission:'.config('admin.permissions.user.show'), ['only' => ['show']]);
        $this->middleware('checkPermission:'.config('admin.permissions.user.reset'), ['only' => ['changePassword','resetPassword']]);
    }
	/**
     * 用户列表
     * @author 晚黎
     * @date   2016-04-13T21:12:18+0800
     * @return [type]                   [description]
     */
    public function index()
    {
        return view('admin.user.list');
    }

    /**
     * datatable 获取数据
     * @author 晚黎
     * @date   2016-04-13T11:25:58+0800
     * @return [type]                   [description]
     */
    public function ajaxIndex()
    {
        $data = UserRepository::ajaxIndex();
        return response()->json($data);
    }
    /**
     * 添加用户视图
     * @author 晚黎
     * @date   2016-04-13T11:26:16+0800
     * @return [type]                   [description]
     */
    public function create()
    {
        $permissions = PermissionRepository::findPermissionWithArray();
        $roles = RoleRepository::findRoleWithObject();
        return view('admin.user.create')->with(compact(['permissions','roles']));
    }

    /**
     * 添加用户
     * @author 晚黎
     * @date   2016-04-14T11:31:29+0800
     * @param  CreateUserRequest        $request [description]
     * @return [type]                            [description]
     */
    public function store(CreateUserRequest $request)
    {
        UserRepository::store($request);
        return redirect('admin/user');
    }

    /**
     * 修改用户视图
     * @author 晚黎
     * @date   2016-04-14T15:01:16+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function edit($id)
    {
        $user = UserRepository::edit($id);
        $roles = RoleRepository::findRoleWithObject();
        $permissions = PermissionRepository::findPermissionWithArray();
        return view('admin.user.edit')->with(compact(['user','permissions','roles']));
    }
    /**
     * 修改用户资料
     * @author 晚黎
     * @date   2016-04-14T15:16:54+0800
     * @param  UpdateUserRequest        $request [description]
     * @param  [type]                   $id      [description]
     * @return [type]                            [description]
     */
    public function update(UpdateUserRequest $request,$id)
    {
        UserRepository::update($request,$id);
        return redirect('admin/user');
    }

    /**
     * 修改用户状态
     * @author 晚黎
     * @date   2016-04-14T11:50:04+0800
     * @param  [type]                   $id     [description]
     * @param  [type]                   $status [description]
     * @return [type]                           [description]
     */
    public function mark($id,$status)
    {
        UserRepository::mark($id,$status);
        return redirect('admin/user');
    }

    /**
     * 删除用户
     * @author 晚黎
     * @date   2016-04-14T11:52:40+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function destroy($id)
    {
        UserRepository::destroy($id);
        return redirect('admin/user');
    }
    /**
     * 查看用户信息
     * @author 晚黎
     * @date   2016-04-14T13:49:32+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function show($id)
    {
        $user = UserRepository::show($id);
        return view('admin.user.show')->with(compact('user'));
    }
    /**
     * 修改用户密码视图
     * @author 晚黎
     * @date   2016-04-14T11:57:42+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function changePassword($id)
    {
        return view('admin.user.reset')->with(compact('id'));
    }

    /**
     * 修改用户密码
     * @author 晚黎
     * @date   2016-04-14T11:58:13+0800
     * @return [type]                   [description]
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        UserRepository::resetPassword($request);
        return redirect('admin/user');
    }
}
