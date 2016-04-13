<?php
namespace App\Repositories\admin;
use App\User;
use Carbon\Carbon;
use Flash;
/**
* 用户仓库
*/
class UserRepository
{
	/**
	 * datatable获取数据
	 * @author 晚黎
	 * @date   2016-04-13T21:14:37+0800
	 * @return [type]                   [description]
	 */
	public function ajaxIndex()
	{
		$draw = request('draw', 1);/*获取请求次数*/
		$start = request('start', config('admin.golbal.list.start')); /*获取开始*/
		$length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

		$search_pattern = request('search.regex', true); /*是否启用模糊搜索*/
		
		$name = request('name' ,'');
		$email = request('email' ,'');
		$confirm_email = request('confirm_email' ,'');
		$status = request('status' ,'');
		$created_at_from = request('created_at_from' ,'');
		$created_at_to = request('created_at_to' ,'');
		$updated_at_from = request('updated_at_from' ,'');
		$updated_at_to = request('updated_at_to' ,'');
		$orders = request('order', []);

		$user = new User;

		/*邮箱名称搜索*/
		if($name){
			if($search_pattern){
				$user = $user->where('name', 'like', $name);
			}else{
				$user = $user->where('name', $name);
			}
		}

		/*权限搜索*/
		if($email){
			if($search_pattern){
				$user = $user->where('email', 'like', $email);
			}else{
				$user = $user->where('email', $email);
			}
		}
		/*验证邮箱搜索*/
		if($confirm_email){
			if($search_pattern){
				$user = $user->where('confirm_email', 'like', $confirm_email);
			}else{
				$user = $user->where('confirm_email', $confirm_email);
			}
		}
		
		/*状态搜索*/
		if ($status) {
			$user = $user->where('status', $status);
		}

		/*权限创建时间搜索*/
		if($created_at_from){
			$user = $user->where('created_at', '>=', getTime($created_at_from));	
		}
		if($created_at_to){
			$user = $user->where('created_at', '<=', getTime($created_at_to, false));	
		}

		/*权限修改时间搜索*/
		if($updated_at_from){
			$uafc = new Carbon($updated_at_from);
			$user = $user->where('created_at', '>=', getTime($updated_at_from));	
		}
		if($updated_at_to){
			$user = $user->where('created_at', '<=', getTime($updated_at_to, false));	
		}

		$count = $user->count();


		if($orders){
			$orderName = request('columns.' . request('order.0.column') . '.name');
			$orderDir = request('order.0.dir');
			$user = $user->orderBy($orderName, $orderDir);
		}

		$user = $user->offset($start)->limit($length);
		$users = $user->get();

		if ($users) {
			foreach ($users as &$v) {
				$v['actionButton'] = $v->getActionButtonAttribute();
			}
		}
		return [
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $users,
		];
	}

	/**
	 * 添加角色
	 * @author 晚黎
	 * @date   2016-04-13T11:50:22+0800
	 * @param  [type]                   $request [description]
	 * @return [type]                            [description]
	 */
	public function store($request)
	{
		$role = new Role;
		if ($role->fill($request->all())->save()) {
			//自动更新角色权限关系
			if ($request->permission) {
				$role->permission()->sync($request->permission);
			}
			Flash::success(trans('alerts.roles.created_success'));
			return true;
		}
		Flash::error(trans('alerts.roles.created_error'));
		return false;
	}
	/**
	 * 修改角色视图
	 * @author 晚黎
	 * @date   2016-04-13T11:50:34+0800
	 * @param  [type]                   $id [description]
	 * @return [type]                       [description]
	 */
	public function edit($id)
	{
		$role = Role::with('permission')->find($id);
		if ($role) {
			$roleArray = $role->toArray();
			if ($roleArray['permission']) {
				$roleArray['permission'] = array_column($roleArray['permission'],'id');
			}
			return $roleArray;
		}
		abort(404);
	}
	/**
	 * 修改角色
	 * @author 晚黎
	 * @date   2016-04-13T11:50:46+0800
	 * @param  [type]                   $request [description]
	 * @param  [type]                   $id      [description]
	 * @return [type]                            [description]
	 */
	public function update($request,$id)
	{
		$role = Role::find($id);
		if ($role) {
			if ($role->fill($request->all())->save()) {
				//自动更新角色权限关系
				if ($request->permission) {
					$role->permission()->sync($request->permission);
				}
				Flash::success(trans('alerts.roles.updated_success'));
				return true;
			}
			Flash::error(trans('alerts.roles.updated_error'));
			return false;
		}
		abort(404);
	}

	/**
	 * 修改角色状态
	 * @author 晚黎
	 * @date   2016-04-13T11:51:02+0800
	 * @param  [type]                   $id     [description]
	 * @param  [type]                   $status [description]
	 * @return [type]                           [description]
	 */
	public function mark($id,$status)
	{
		$role = role::find($id);
		if ($role) {
			$role->status = $status;
			if ($role->save()) {
				Flash::success(trans('alerts.roles.updated_success'));
				return true;
			}
			Flash::error(trans('alerts.roles.updated_error'));
			return false;
		}
		abort(404);
	}

	/**
	 * 删除角色
	 * @author 晚黎
	 * @date   2016-04-13T11:51:19+0800
	 * @param  [type]                   $id [description]
	 * @return [type]                       [description]
	 */
	public function destroy($id)
	{
		$isDelete = Role::destroy($id);
		if ($isDelete) {
			Flash::success(trans('alerts.roles.deleted_success'));
			return true;
		}
		Flash::error(trans('alerts.roles.deleted_error'));
		return false;
	}

	/**
	 * 查看角色权限
	 * @author 晚黎
	 * @date   2016-04-13T17:09:22+0800
	 * @param  [type]                   $id [description]
	 * @return [type]                       [description]
	 */
	public function show($id)
	{
		$role = Role::select('id')->with('permission')->find($id);
		$array = [];
		if ($role->permission) {
			foreach ($role->permission as $v) {
				array_set($array, $v->slug, ['name' => $v->name,'desc' => $v->description]);
			}
		}
		return $array;
	}
}