<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use App\School;
use App\User;
use App\Level;
use App\Teacher;
use Mail;
use Hash;

use Aman\EmailVerifier\EmailChecker;
use App\Mail\TeacherAccountInfo;
class SchoolController extends Controller
{
       
   public function __construct()
   {
       $this->middleware('auth');
   }
   
   
   function home(){


//$user =User::find(Auth::user()->id);

//echo $userable = $user->userable;

//$school= School::find(15);

//echo $u=$school->user;

$user = Auth::user();
  $bookingsOfUser = app('rinvex.subscriptions.plan_subscription')->ofUser($user)->get(); 
  
return view('school.home',['bookingsOfUser'=>$bookingsOfUser]);
    }
    


 function complete_registration(){


   
   return view('school.complete_register');
   
 }
    

 function complete_registration_handle(Request $request){

$phone=$request->input('phone');
 $address=$request->input('address');
 $name=$request->input('name');
   $user=User::find(Auth::user()->id);
  
   $school= new School;
   $school->name=$name;
   $school->phone=$phone;
   $school->address=$address;
   $school->save();

   $user->userable_id=$school->id;
   $user->userable_type="App\School";

   $user->save();
  
   //$school=School::find($school->id);
  
   //$user->userable()->save($school);

   return redirect()->route('school.home')->with('message', 'Your registration is now complete you can now register  your teacher ');
 }



 function new_teacher(){


   return view('school.new_teacher');
 }



 function new_teacher_handle(Request $request){

  
  $request->validate([ 'email' =>'required|string|email|max:255|unique:users',
  
  
  ]);

 $email=$request->input('email') ;

// Check email adrdress if is valid using https://github.com/aman00323/email-checker package

$check_email=app(EmailChecker::class)->checkMxAndDnsRecord($email);
  
 
  
  if ($check_email[0]=="valid")
  
  
  {
  
   //create random password
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';

$random_password= substr(str_shuffle($permitted_chars), 0, 4);



//create random username


$continue = true;
while ($continue) {
   $permitted_char = 'abcdefghijklmnopqrstuvwxyz';

   $random_useranme= substr(str_shuffle($permitted_char), 0, 10);
        
   $check_username = User::where('username', $random_useranme)->count();

        if ($check_username < 1)
            $continue = false;

            $random_useranme= $random_useranme;
 }


 // new user teacher 

 $user=Auth::user();
 $teacher =new Teacher;

 $teacher->school_id=$user->userable->id;
 $teacher->save();

 $user = new User;
 $user->username=$random_useranme;
 $user->email=$email;
 $user->userable_type='App\Teacher';
 $user->userable_id=$teacher->id;
 $user->password=Hash::make($random_password);

  $user->save();






 //sending email to create new account to the teacher



 
   $data = array('username'=>$user->username, 'password'=>$random_password);



   Mail::to($user->email)->send(new TeacherAccountInfo($data));
   

   //Mail::send(['text'=>'mail'], $data, function($message) {
     // $message->to('mugiranezahimbazayves@gmail.com', 'Twis Account info')->subject
     //    ('Twis Account creation info');
     // $message->from('mugiranezahimbazayves@gmail.com','TWIS');
 //  });
  

   return redirect()->back()->with('message', 'Teacher registred succesfully. We have login credentintial to his/her E-mail');

  }

  else{

  return redirect()->back()->with('warning', 'Email not exist.');

  }

  

   //return redirect()->back()->with('message', 'Teacher created successful.');

 }


   
}
