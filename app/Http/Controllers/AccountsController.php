<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\user;
use Image;
class AccountsController extends Controller
{
    function profile(){

        $user=Auth::user();

        if ( $user->userable_type=="App\Teacher" ) {

            $teacher = $user->userable;
            return view('accounts.teacherProfile',['user'=>$user, 'teacher'=>$teacher]);
        }
    
    
        if ( $user->userable_type=="App\School" ) {
            $school = $user->userable;
            return view('account.schooltProfile',['user'=>$user, 'school'=>$school]);
        }
    
    
        if ( $user->userable_type=="App\Parent" ) {

            $parent = $user->userable;
            return view('account.parentProfile',['user'=>$user, ' parent'=>$parent]);
        }
    
    
        if ($user->userable_type=="App\Student" ) {
           
            $student = $user->userable;
            return view('accounts.studentProfile',['user'=>$user, 'student'=>$student]);
        }
    
    
        if ($user->userable_type=="App\InvitedParent" ) {

            $invitedParent = $user->userable;
            return view('accounts.invitedParentProfile',['user'=>$user, 'invitedParent'=>$invitedParent]);
        }
     


        

        
    }

    function edit(Request $request) {


        $user=Auth::user();
        if($user->userable_type=="App\Student"){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'avatar' => 'nullable',
            'username' => 'required',
        ]);

       $first_name= $request->first_name;
       $last_name =$request->last_name;
       $level_id=$request->level;
       $username=$request->username;
      
       $student = $user->userable;

        
        if($request->hasFile('avatar')){
            $avatar=$request->file('avatar');
         $filename=time().'.'.$avatar->getClientOriginalExtension();
          // Image::make($avatar)->resize(250,250)->save(public_path('storage/users'.$filename));


         $savePath= public_path('storage/users');
$avatar->move($savePath,$filename);


    // $request->avatar->storeAs('images',$filename,'public');

    }

       $student->first_name=$first_name;
     $student->last_name=$last_name;
       $student->level_id=$level_id;
       $student->save();

     $user->username=$username;
        $user->avatar=$filename;
      $user->save();

        }

return redirect()->back()->with('message', 'you sussessfully edited your profile');
    }


    function changeAvatar() {


        return view('accounts.changeAvatar');
    }


    function changePesonalInfo(){
       return view('accounts.changePersonalInfo') ;
    }
}
