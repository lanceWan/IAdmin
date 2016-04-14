<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuRelation;

class MenuController extends Controller
{
    public function index()
    {
    	$menus = MenuRelation::all()->toArray();

    	$mainMenu = array_unique(array_column($menus,'parent_id'));

    	$treeMenu = Menu::where('status',config('admin.global.status.active'))->with('relation')->find(10);

    	dd($treeMenu->toArray());

    }
}
