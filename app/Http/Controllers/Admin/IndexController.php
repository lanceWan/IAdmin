<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Friend;
use Auth;
class IndexController extends Controller
{

	public function index()
	{
		return view('admin.index.index');
	}

	public function findMyFriend()
	{
		$friends = Friend::with('user')->where('user_id',Auth::user()->id)->get()->toArray();
		if ($friends) {
			$item = [];
			foreach ($friends as $friend) {
				$temp = [];
				$temp['id'] = $friend['user']['id'];
				$temp['name'] = $friend['user']['name'];
				$temp['face'] = 'http://tp1.sinaimg.cn/1571889140/180/40030060651/1';
				$item[] = $temp;
			}
			// echo json_encode(['status' => 1 ,'msg' => 'ok','data' => ["name" => "在线好友","nums" => 1,"id" => 1,'item' => $item] ]);exit();
			return response()->json(['status' => 1 ,'msg' => 'ok','data' => ["name" => "在线好友","nums" => 1,"id" => 1,'item' => $item] ]);
		}

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
