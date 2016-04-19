<?php
namespace App\Repositories\admin;
use App\Models\Menu;
use Cache;
class MenuRepository
{
	/**
	 * jstree ajax获取菜单数据
	 * @author 晚黎
	 * @date   2016-04-19T13:22:57+0800
	 * @return [type]                   [description]
	 */
	public function ajaxIndex()
	{
		//判断是否缓存menu数据
		// if (Cache::has('menuList')) {
		// 	return Cache::get('menuList');
		// }

		$menus = Menu::where([
				'language'=>config('app.locale'),
				'status' => config('admin.global.status.active'),
				])
				->orderBy('sort','desc')
				->get()
				->toArray();
		if ($menus) {
			$menuList = $this->sortMenu($menus);
			//缓存数据
			Cache::forever('menuList', $menuList);
			return $menuList;
		}
		return [];
	}

	private function sortMenu($menus,$pid = 0){
		$arr = [];
		foreach($menus as $k =>  $v){
			if($v['pid'] == $pid){
		            $arr[$k] = $v;
		            $arr[$k]['child'] = self::sortMenu($menus,$v['id']);
	        }
	    }
		return $arr;
	}		
}