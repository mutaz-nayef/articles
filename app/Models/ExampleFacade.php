<?php

namespace App\Models;

use Illuminate\Support\Facades\Facade;

class ExampleFacade extends Facade

{
    protected static function getFacadeAccessor()
    {
//        return 'example';
    return Example::class;  // '\App\Example'
    }

}
