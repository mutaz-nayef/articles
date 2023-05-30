<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    public function home()
    {
//        return view('welcome');
        return View::make('welcome');
//        Cache::remember('foo', 60, fn() => 'foobar');
//        return Cache::get('foo');

    }
}
