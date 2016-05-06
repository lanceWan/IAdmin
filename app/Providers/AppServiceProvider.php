<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/*service*/
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ProjectRepository', function(){
            return new \App\Repositories\Project\ProjectRepository();
        });
    }
}
