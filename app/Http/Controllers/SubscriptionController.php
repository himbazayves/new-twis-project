<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use Auth;

class SubscriptionController extends Controller
{

            
   public function __construct()
   {
     $this->middleware('auth');
   }
 function subscribe($plan){
  $plan=Plan::find($plan);
  return view('subscription.subscribe',['plan'=>$plan]);


 }

function plans(){

$plans=Plan::all();
  return view('subscription.plans',['plans'=>$plans]);
}



function subscribeHandle(Request $request){

  $request->validate(['students'=>'required']);

  $students=$request->input('students');
  $plan_id=$request->input('plan_id');

  $plan_name=$request->input('plan_name');

  $plan = app('rinvex.subscriptions.plan')->find($plan_id);

$user=Auth::user();
  $user->newSubscription($plan_name, $plan);
  return redirect()->route('school.home')
  ->with('message', 'You have activate new plan sucessfully');


 }

}
