<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PermissionRepository;
class PermissionController extends Controller
{
    public function index()
    {
    	return view('admin.permission.list');
    }

    public function ajaxIndex()
    {
    	$data = PermissionRepository::ajaxIndex();
    	return response()->json($data);
    }
}
