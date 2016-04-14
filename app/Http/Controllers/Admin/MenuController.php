<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use DB;
class MenuController extends Controller
{
    public function index()
    {
    	$menus = DB::select('select node.name as name,  (count(parent.name) - 1) as deep,parent.category_id as pid from nested_category as node,nested_category as parent where node.lft between parent.lft and parent.rgt group by node.name order by node.lft');

    	dd($menus);
    	return view('admin.menu.list');

    }
}
