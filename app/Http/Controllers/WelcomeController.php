<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class WelcomeController extends Controller
{
    function welcome(){


     $plans=Plan::all();
     return view('welcome',['plans'=>$plans]) ;
    }
}
