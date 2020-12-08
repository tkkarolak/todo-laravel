<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function showHelloWorld(){
        $now  = Carbon::now();

        return view('hello-world',['now'=>$now]);
    }
}
