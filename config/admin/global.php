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
		'audit' => 0,
		'active' => 1,
		'ban' => 2,
		'trash' => 99,
		'destory' => -1,

		/**
		 * sponsor  研究发起者
		 * major    主要研究者
		 * normal   研究者
		 */
		'researcher' => [
			'sponsor' => 1,
			'major' => 2,
			'normal' => 3,
		],
		'project' => [
			'launch' => 1,
			'enter' => 2,
			'follow' => 3,
			'finish' => 4,
			'exit' => 5,
		],


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
	]
];