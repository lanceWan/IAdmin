<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('UserRepository', function($app){
            return new \App\Repositories\admin\UserRepository();
        });

        $this->app->singleton('PermissionRepository', function($app){
            return new \App\Repositories\admin\PermissionRepository();
        });
        $this->app->singleton('RoleRepository', function($app){
            return new \App\Repositories\admin\RoleRepository();
        });
    }
}
