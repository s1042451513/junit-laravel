<?php
namespace Wengdada\JunitLaravel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

Class JunitServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
        $this->loadViewsFrom(
            __DIR__.'/../resource/views','junit'
        );
    }

    public function routeConfiguration()
    {
        return [
            'namespace' => 'Wengdada\JunitLaravel\Http\Controllers',
            'prefix' => 'junit'
        ];
    }

    public function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function(){
            $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
        });
    }
}