<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use UserRepository;
class UserController extends Controller
{
	/**
	 * 用户列表
	 * @author 晚黎
	 * @date   2016-04-11T16:26:20+0800
	 * @return [type]                   [description]
	 */
    public function index()
    {
    	return view('admin.user.list');
    }


    public function ajaxIndex()
    {
    	$data = UserRepository::ajaxIndex();
    	return response()->json($data);
    }
}
