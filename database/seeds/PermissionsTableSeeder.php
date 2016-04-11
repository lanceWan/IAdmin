<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*显示菜单管理*/
        Permission::create([
            'name' => 'Show Menus Manage',
            'slug' => 'admin.menus.manage',
            'description' => '显示菜单管理'
        ]);
        /**
         * 显示菜单列表
         */
        Permission::create([
            'name' => 'Show Menus list',
            'slug' => 'admin.menus.list',
            'description' => '显示菜单列表'
        ]);

        /**
         * 创建菜单
         */
        Permission::create([
            'name' => 'Menus create',
            'slug' => 'admin.menus.create',
            'description' => '创建菜单'
        ]);

        /**
         * 删除菜单
         */
        Permission::create([
            'name' => 'Menus delete',
            'slug' => 'admin.menus.delete',
            'description' => '删除菜单'
        ]);

        /**
         * 修改菜单
         */
        Permission::create([
            'name' => 'Menus edit',
            'slug' => 'admin.menus.edit',
            'description' => '修改菜单'
        ]);

        /////////////
        //角色管理 //
        ////////////
        Permission::create([
        	'name' => 'Roles manage',
        	'slug' => 'admin.roles.manage',
        	'description' => '显示角色管理'
        ]);

        /**
         * 显示角色列表
         */
        Permission::create([
            'name' => 'Show roles list',
            'slug' => 'admin.roles.list',
            'description' => '显示角色列表'
        ]);

        /**
         * 创建角色
         */
        Permission::create([
            'name' => 'roles create',
            'slug' => 'admin.roles.create',
            'description' => '创建角色'
        ]);

        /**
         * 删除角色
         */
        Permission::create([
            'name' => 'roles delete',
            'slug' => 'admin.roles.delete',
            'description' => '删除角色'
        ]);

        /**
         * 修改角色
         */
        Permission::create([
            'name' => 'roles edit',
            'slug' => 'admin.roles.edit',
            'description' => '修改角色'
        ]);


        /////////////
        //权限管理 //
        ////////////
        Permission::create([
        	'name' => 'permissions manage',
        	'slug' => 'admin.permissions.manage',
        	'description' => '显示权限管理'
        ]);

        /**
         * 显示权限列表
         */
        Permission::create([
            'name' => 'Show permissions list',
            'slug' => 'admin.permissions.list',
            'description' => '显示权限列表'
        ]);

        /**
         * 创建权限
         */
        Permission::create([
            'name' => 'permissions create',
            'slug' => 'admin.permissions.create',
            'description' => '创建权限'
        ]);

        /**
         * 删除权限
         */
        Permission::create([
            'name' => 'permissions delete',
            'slug' => 'admin.permissions.delete',
            'description' => '删除权限'
        ]);

        /**
         * 修改权限
         */
        Permission::create([
            'name' => 'permissions edit',
            'slug' => 'admin.permissions.edit',
            'description' => '修改权限'
        ]);
        /**
         * 禁用权限
         */
        Permission::create([
            'name' => 'permissions trash',
            'slug' => 'admin.permissions.trash',
            'description' => '禁用权限'
        ]);

        /**
         * 恢复权限
         */
        Permission::create([
            'name' => 'permissions undo',
            'slug' => 'admin.permissions.undo',
            'description' => '恢复权限'
        ]);

        /////////////
        //用户管理 //
        ////////////
        Permission::create([
        	'name' => 'users manage',
        	'slug' => 'admin.users.manage',
        	'description' => '显示用户管理'
        ]);

        /**
         * 显示用户列表
         */
        Permission::create([
            'name' => 'Show users list',
            'slug' => 'admin.users.list',
            'description' => '显示用户列表'
        ]);

        /**
         * 创建用户
         */
        Permission::create([
            'name' => 'users create',
            'slug' => 'admin.users.create',
            'description' => '创建用户'
        ]);

        /**
         * 删除用户
         */
        Permission::create([
            'name' => 'users delete',
            'slug' => 'admin.users.delete',
            'description' => '删除用户'
        ]);

        /**
         * 修改用户
         */
        Permission::create([
            'name' => 'users edit',
            'slug' => 'admin.users.edit',
            'description' => '修改用户'
        ]);

        //////////////////
        ///登录后台权限 //
        /////////////////

        Permission::create([
            'name' => 'login.backend',
            'slug' => 'login.backend',
            'description' => '登录后台权限'
        ]);

        /*日志*/
        Permission::create([
            'name' => 'Show Log Manage',
            'slug' => 'admin.logs.manage',
            'description' => '显示日志管理'
        ]);

        Permission::create([
            'name' => 'Show Log All',
            'slug' => 'admin.logs.all',
            'description' => '显示日志总览'
        ]);

        Permission::create([
            'name' => 'Show Log List',
            'slug' => 'admin.logs.list',
            'description' => '显示日志列表'
        ]);
    }
}
