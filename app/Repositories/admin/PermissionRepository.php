<?php
namespace App\Repositories\admin;
use App\Models\Permission;
use Carbon\Carbon;
/**
* 权限仓库
*/
class PermissionRepository
{
	/**
	 * datatable获取数据
	 * @author 晚黎
	 * @date   2016-04-11T16:44:40+0800
	 * @return [type]                   [description]
	 */
	public function ajaxIndex()
	{
		$draw = request('draw', 1);/*获取请求次数*/
		$start = request('start', config('admin.golbal.list.start')); /*获取开始*/
		$length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

		$search_pattern = request('search.regex', true); /*是否启用模糊搜索*/
		
		$name = request('name' ,'');
		$slug = request('slug' ,'');
		$description = request('description' ,'');
		$model = request('model' ,'');
		$status = request('status' ,'');
		$created_at_from = request('created_at_from' ,'');
		$created_at_to = request('created_at_to' ,'');
		$updated_at_from = request('updated_at_from' ,'');
		$updated_at_to = request('updated_at_to' ,'');
		$orders = request('order', []);

		$permission = new Permission;

		/*权限名称搜索*/
		if($name){
			if($search_pattern){
				$permission = $permission->where('name', 'like', $name);
			}else{
				$permission = $permission->where('name', $name);
			}
		}

		/*权限搜索*/
		if($slug){
			if($search_pattern){
				$permission = $permission->where('slug', 'like', $slug);
			}else{
				$permission = $permission->where('slug', $slug);
			}
		}
		/*描述搜索*/
		if($description){
			if($search_pattern){
				$permission = $permission->where('description', 'like', $description);
			}else{
				$permission = $permission->where('description', $description);
			}
		}

		/*模型搜索*/
		if($model){
			if($search_pattern){
				$permission = $permission->where('model', 'like', $model);
			}else{
				$permission = $permission->where('model', $model);
			}
		}
		
		/*状态搜索*/
		if ($status) {
			$permission = $permission->where('status', $status);
		}

		/*权限创建时间搜索*/
		if($created_at_from){
			$permission = $permission->where('created_at', '>=', getTime($created_at_from));	
		}
		if($created_at_to){
			$permission = $permission->where('created_at', '<=', getTime($created_at_to, false));	
		}

		/*权限修改时间搜索*/
		if($updated_at_from){
			$uafc = new Carbon($updated_at_from);
			$permission = $permission->where('created_at', '>=', getTime($updated_at_from));	
		}
		if($updated_at_to){
			$permission = $permission->where('created_at', '<=', getTime($updated_at_to, false));	
		}

		$count = $permission->count();


		if($orders){
			$orderName = request('columns.' . request('order.0.column') . '.name');
			$orderDir = request('order.0.dir');
			$permission = $permission->orderBy($orderName, $orderDir);
		}

		$permission = $permission->offset($start)->limit($length);
		$permissions = $permission->get();

		// if ($permissions) {
		// 	foreach ($permissions as &$v) {
		// 		$v['actionButton'] = $v->getActionButtonAttribute();
		// 	}
		// }
		return [
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $permissions,
		];
	}
}