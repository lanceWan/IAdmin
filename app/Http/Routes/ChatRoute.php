<?php
/**
 * 聊天
 */
$router->group(['prefix' => 'chat'], function($router){
	$router->post('sendMessage', 'ChatController@sendMessage');
});

$router->resource('chat', 'ChatController');