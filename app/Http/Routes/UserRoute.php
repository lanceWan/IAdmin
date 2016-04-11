<?php
/**
 * 用户路由
 */
$router->group(['prefix' => 'user'], function($router){
	$router->get('ajaxindex', 'UserController@ajaxIndex');
});

$router->resource('user', 'UserController');