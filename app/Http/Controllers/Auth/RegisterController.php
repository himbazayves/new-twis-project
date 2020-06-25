<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\School;
use Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

//redirect to different dashboard according to user type


public function register(Request $request){

    $this->validator($request->all())->validate();

 

 $user_type=$request->input('user_type');    
 $email=$request->input('email');

 $username=$request->input('username');
 $password=Hash::make($request->input('password'));

 $address=$request->input('address');
 $user_type;
  

 if($user_type==1){
    $userable_type="App\School";
    $user= User::create(['username'=>$username,'email'=>$email,'password'=>$password, 'userable_type'=>$userable_type]);

    
Auth::login($user,true);
return redirect()->route('school.complete_registration');
    
 }

 if($user_type==2){
    $userable_type="App\Parent";
    $user= User::create(['username'=>$username,'email'=>$email,'password'=>$password, 'userable_type'=>$userable_type]);
    
    Auth::login($user,true);
    return redirect()->route('parent.home');
 }
 

 //$user->email=$email;
 //$user->email=$email;
 //$user->email=$email;
 
//return redirect()->route('school.home');
//return redirect($this->redirectPath('/school/home'))->with('message', 'You have registred susscfull!');
 


 


    
 //$school= new School;
 //$school->name=$name;
 //$school->phone=$phone;
 //$school->address=$address;
// $school->save();

 //$school=School::find($school->id);

 //$user->school()->save($school);

 //$user->userable()->associate($school);
 //$user->email=$email;
 //$user->email=$email;
 //$user->email=$email;
 
//return redirect()->route('school.home');
//return redirect($this->redirectPath('/school/home'))->with('message', 'You have registred susscfull!');


//Auth::login($user,true);
//return redirect()->route('school.complete_registration');
 

//$tag = new Tag(['name' => 'Foo bar.']);

//Find the video to insert into a tag
//$video = Video::find(1);

//In the tag relationship, save a new video
//$tag->videos()->save($video);
   

}



  

    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string',  'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'user_type' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
