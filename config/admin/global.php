<?php
/**
 * 后台全局配置
 */
return[
	/**
	 * 全局状态
	 * addit 	待审核
	 * active 	正常
	 * ban 		禁用
	 * trash	回收站
	 * destory 	彻底删除
	 */
	'status' => [
		'audit' => 3,
		'active' => 1,
		'ban' => 2,
		'trash' => 99,
		'destory' => -1
	],
	////////
	//分页//
	////////
	'lsit' => [
		'start' => 0,
		'length' => 10
	],
	////////
	//权限//
	////////
	'permission' => [
		// 控制是否显示查看按钮
		'show' => false,
		// trait 中的 action 参数
		'action' => 'permission',
	],
	////////
	//角色//
	////////
	'role' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'role',
	],
	////////
	//用户//
	////////
	'user' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'user',
	],
	////////
	//标签//
	////////
	'tag' => [
		// 控制是否显示查看按钮
		'show' => false,
		// trait 中的 action 参数
		'action' => 'tag',
	],
	////////
	//文章//
	////////
	'article' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'article',
	],
	// 七牛图片上传路径
	'imagePath' => 'iwanli/image/',
	// 每页显示条数
	'paginate' => 6,
	// 缓存
	'cache' => [
		'menu' => 'menuList',
	]
];