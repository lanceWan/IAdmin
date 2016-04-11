<?php
/**
 * 权限路由
 */
$router->group(['prefix' => 'permission'], function($router){
	$router->get('ajaxindex', 'PermissionController@ajaxIndex');
});

$router->resource('permission', 'PermissionController');