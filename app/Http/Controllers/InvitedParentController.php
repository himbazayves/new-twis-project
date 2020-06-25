<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\InvitedParent;
use Auth;


class InvitedParentController extends Controller
{
    function home(){

        //check if teacher profile is complited
        
        $user =User::find(Auth::user()->id);
        
        $invitedParent = $user->userable;

        $first_name= $invitedParent->first_name;
        $user2= Auth::user();

        $parent= $user2->userable;
         $kid=$parent->student;

       // $level= $invitedParent->level_id;

        if( $first_name==NULL){

         
   
            return view('invitedParent.complete_registration');
        }


        return view('invitedParent.home',['kid'=>$kid]);
    }



    function complete_registration_handle(Request $request){

        $request->validate([ 'first_name' =>'required',


                             'last_name' =>'required',
                             'phone_number' =>'required',


        ]);
      
        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $phone_number=$request->input('phone_number');
       

        $user =User::find(Auth::user()->id);

        $invitedParent=$user->userable;
        $invitedParent->first_name=$first_name;
        $invitedParent->last_name=$last_name;
        $invitedParent->phone_number=$phone_number;
       
       
        $invitedParent->save();
         
          //$school=School::find($school->id);
         
          //$user->userable()->save($school);
       
          return redirect()->route('invitedParent.home')->with('message', 'Your profile  is now complete you can now check your student performance and communicate with his teacher ');
        
      }

      function myKid(){
       $user= Auth::user();

       $parent= $user->userable;
        $kid=$parent->student;
        return view('invitedParent.myKid', ['kid'=>$kid, 'parent'=>$parent]);
      }


}
