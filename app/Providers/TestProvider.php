<?php

namespace App\Providers;

use App\Models\Example;
use Illuminate\Support\ServiceProvider;

class TestProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('example',function (){
          return new Example();
      });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
