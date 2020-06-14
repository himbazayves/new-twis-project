<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $user = User::find(1);
       // $plan = app('rinvex.subscriptions.plan')->find(1);
        
        //$user->newSubscription('main', $plan);
       //return $user->subscription('main')->canceled();

      // return $user->subscription('main')->ended();

      // return $user->subscribedTo(1);


      

       
        return view('home');
    }
}
