<?php

namespace Jas\ManageEmployees\Providers;

use Illuminate\Support\ServiceProvider;

class EmployeeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Jas\ManageEmployees\Controllers\EmployeeController');
        $this->app->make('Jas\ManageEmployees\Controllers\DepartmentController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'emp');
        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');
        $this->loadMigrationsfrom(__DIR__.'/../migrations');

        $this->publishes([__DIR__.'/../assets' => public_path('employee-pkg-assets')]);

    }
}
