<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class IndexController extends Controller
{

	public function index()
	{
		return view('admin.index.index');
	}

	/**
	 * dataTable 多语言
	 * @author 晚黎
	 * @date   2016-04-11T14:13:10+0800
	 * @return [type]                   [description]
	 */
    public function dataTableI18n()
    {
    	return trans('pagination.i18n');
    }
}
