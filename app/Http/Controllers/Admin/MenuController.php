<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use MenuRepository;
class MenuController extends Controller
{
	/**
	 * 菜单首页
	 * @author 晚黎
	 * @date   2016-04-19T10:50:12+0800
	 * @return [type]                   [description]
	 */
    public function index()
    {
    	$menus = MenuRepository::ajaxIndex();
    	return view('admin.menu.list')->with(compact('menus'));
    }

    /**
     * ajax获取菜单数据
     * @author 晚黎
     * @date   2016-04-19T10:50:29+0800
     * @return [type]                   [description]
     */
    public function ajaxIndex()
    {
    	$menus = MenuRepository::ajaxIndex();
    	return response()->json($menus);
    }
}
