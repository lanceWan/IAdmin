<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => '超级管理员',
            'level' => 1,
        ]);

        $userRole = Role::create([
            'name' => '研究发起者',
            'slug' => 'research.creator',
            'description' => '研究发起者',
        ]);

        $userRole = Role::create([
            'name' => '主要研究者',
            'slug' => 'research.main',
            'description' => '主要研究者',
        ]);

        $userRole = Role::create([
            'name' => '研究者',
            'slug' => 'research.user',
            'description' => '研究者',
        ]);
        
        /*管理员初始化所有权限*/
        $all_permissions = Permission::where('status',config('admin.global.status.active'))->get();
        
        foreach($all_permissions as $all_permission){
            $adminRole->attachPermission($all_permission);
        }

    }
}
