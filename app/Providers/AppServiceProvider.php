<?php

namespace App\Providers;

use App\Models\Collaborator;
use App\Models\Example;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//       $this->app->singleton('App\Models\Example', function () {
//            $collaborator = new Collaborator();
//            $foo = 'foobar';
//
//            return new Example($collaborator, $foo);
//        });
        $this->app->bind(Example::class, function () {
            return new Example('api-key-here');
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
