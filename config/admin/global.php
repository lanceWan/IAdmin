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
		'destory' => -1
	],
	'lsit' => [
		'start' => 0,
		'length' => 10
	]
];