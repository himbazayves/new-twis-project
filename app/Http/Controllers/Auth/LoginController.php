<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */



    protected function authenticated()
    {
    if ( Auth::user()->userable_type=="App\Teacher" ) {
        return redirect()->route('teacher.home');
    }


    if ( Auth::user()->userable_type=="App\School" ) {
        return redirect()->route('school.home');
    }


    if ( Auth::user()->userable_type=="App\Parent" ) {
        return redirect()->route('parent.home');
    }


    if (Auth::user()->userable_type=="App\Student" ) {
        return redirect()->route('student.home');
    }


    if (Auth::user()->userable_type=="App\InvitedParent" ) {
        return redirect()->route('invitedParent.home');
    }
 
    
     return redirect('/home');
    }

    public function username()
    {
        return 'username';
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
