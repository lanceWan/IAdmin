<?php
/**
 * 用户路由
 */
$router->group(['prefix' => 'user'], function($router){
	$router->get('ajaxindex', 'UserController@ajaxIndex');
	$router->get('/{id}/mark/{status}', 'UserController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);
});

$router->resource('user', 'UserController');