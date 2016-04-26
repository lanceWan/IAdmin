<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use ChatRepository;
class ChatController extends Controller
{
	/**
	 * 发送私聊消息
	 * @author 晚黎
	 * @date   2016-04-26T09:55:13+0800
	 * @return [type]                   [description]
	 */
    public function sendMessage(Request $request)
    {
    	$data = $request->all();
    	// dd($data);
    	$result = ChatRepository::messagePublish($data['fromUserId'],$data['toUserId'],$data['objectName'],json_encode($data['content']));
    	return $result;
    }
}
