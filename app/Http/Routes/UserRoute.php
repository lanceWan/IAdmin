<?php
/**
 * 用户路由
 */
$router->group(['prefix' => 'user'], function($router){
	$router->get('ajaxIndex', 'UserController@ajaxIndex');
	$router->get('/{id}/mark/{status}', 'UserController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);
	$router->get('/{id}/reset','UserController@changePassword')->where(['id' => '[0-9]+']);
	$router->post('reset','UserController@resetPassword');
});

$router->resource('user', 'UserController');