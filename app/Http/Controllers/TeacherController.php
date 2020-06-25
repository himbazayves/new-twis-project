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
use App\Student;
use Validator;
use App\InvitedParent;
use App\Mail\TeacherAccountInfo;


use Aman\EmailVerifier\EmailChecker;


use App\Imports\ImportStudent;
use Maatwebsite\Excel\Facades\Excel;
use DB;


class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    


    function home(){

        //check if teacher profile is complited
        
        $user =User::find(Auth::user()->id);
        
        $teacher = $user->userable;

        $name= $teacher->name;

        $level= $teacher->level_id;
      
        //$highPerformerStudent=$teacher->students->sortBy('columnName')->first();


        if( $name==NULL){

            $levels=Level::all();
   
            return view('teacher.complete_registration',['levels'=>$levels]);
        }

        
        
        //$school= School::find(15);
        
        //echo $u=$school->user;
        
        
           
        return view('teacher.home');
            }



            function complete_registration(){

                $levels=Level::all();
   
                return view('teacher.complete_registration',['levels'=>$levels]);
                
              }



              function complete_registration_handle(Request $request){

                $request->validate([ 'name' =>'required',
                                     'level' =>'required',
  
  
                ]);
              
                $name=$request->input('name');
              
                $level=$request->input('level');

                $user =User::find(Auth::user()->id);

                $teacher=$user->userable;
                $teacher->name=$name;
                $teacher->level_id=$level;
               
                $teacher->save();
                 
                  //$school=School::find($school->id);
                 
                  //$user->userable()->save($school);
               
                  return redirect()->route('teacher.home')->with('message', 'Your profile  is now complete you can now register  your teacher ');
                
              }


            function new_student(){


                return view('teacher.new_student');
                
            }


function new_student_handle(Request $request){

          
               

               
  //$request->validate([ 'file' => 'required|max:500|mimes:XLSX,xls,csv',]);
  $validator = Validator::make(
    [
        'file'      => $request->file,
        'extension' => strtolower($request->file->getClientOriginalExtension()),
    ],
    [
        'file'          => 'required',
        'extension'      => 'required|in:csv',
    ]
  
  );

if ($validator->passes()){
$dateTime= date('Ymd_His');
//$dateTime=toDateTimeString();
$file=$request->file('file');
$fileName=$dateTime.'-'.$file->getClientOriginalName();
$savePath= public_path('/teacherStudent/uploads/');
$file->move($savePath,$fileName);

$user=Auth::user();

$teacher = $user->userable;

$teacher_id=$teacher->id; 
$school_id=$teacher->school->id;
$userable_type="App\Student";
$level_id=$teacher->level_id;

$data = [
    'teacher_id' =>$teacher_id, 
    'school_id' =>$school_id,
    'userable_type'=>$userable_type,
    'level_id'=>$level_id,
    
]; 
Excel::import(new ImportStudent($data),$savePath.$fileName);
   return back()->with('message', 'Students inserted successfully.');









//echo "sucesss";
}


else{
    return redirect()->back()
    ->with('errors', 'This is not our templete');
}

             

            }


            function new_student_handle_manual(Request $request){


            $request->validate([

                'fisrt_name'=>'required',
                'last_name'=>'required',
            ]);

            $first_name=$request->input('first_name');
            $last_name=$request->input('last_name');

            $user=Auth::user();

            $teacher = $user->userable;
            
            $teacher_id=$teacher->id; 
            $school_id=$teacher->school->id;
            $userable_type="App\Student";
            $level_id=$teacher->level_id;



            $student = new Student;
             $student->first_name=$first_name;
             $student->last_name=$last_name;
             $student->level_id=$level_id;
             $student->teacher_id=$teacher_id;
             $student->school_id=$school_id;

             $student->save();

             $username=$first_name;


             $check_username = User::where('username', $username)->count();
             if($check_username < 1){

               $username=$username;
             }



             else{
                $continue = true;
                while ($continue) {
                   $permitted_char = 'abcdefghijklmnopqrstuvwxyz12345678ABCDEFGHUJKLMNOPKLSXWZ';
                
                   $random_useranme= substr(str_shuffle($permitted_char), 0, 5);
                    $username= $username.$random_useranme ;   
                   $check_username = User::where('username', $username)->count();
                
                        if ($check_username < 1)
                            $continue = false;
                
                            $username=$username;
                 }


             }
            

              $user= new User;
              $user->username=$username;
              $user->userable_type='App\Student';
              $user->userable_id=$student->id;
              $user->password=Hash::make(123);
  
              $user->save();
          
              return back()->with('message', 'Student inserted successfully.');

            }



      function students(){


        $user =User::find(Auth::user()->id);
        
        $teacher = $user->userable;

        $students=$teacher->students;

return view('teacher.students',['students'=>$students]);

      }      


      function inviteParent($student){


        return view('teacher.inviteParent',['student'=>$student]);
      }


      function inviteParentHandle(Request $request){

        

        $request->validate([ 'email' =>'required|string|email|max:255|unique:users',
  
  
        ]);
      
        $student_id=$request->input('student_id') ;
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
       $parent =new InvitedParent;
      
       $parent->student_id=$student_id;
       $parent->save();
      
       $user = new User;
       $user->username=$random_useranme;
       $user->email=$email;
       $user->userable_type='App\InvitedParent';
       $user->userable_id=$parent->id;
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
        
      
         return redirect()->back()->with('message', 'Parent invited succesfully. We have login credentintial to his/her E-mail');
      

      }


      else{

        return redirect()->back()->with('warning', 'The email does not exist');
      
      }



    }


    
    function studentView($student){
      $student=Student::find($student);
      $levels=Level::all();

    return view('teacher.studentView',['student'=>$student,'levels'=>$levels]);
  }

  function editStudentAccount(Request $request){
$request->validate([
  'username'=>'required',
]);

$user=User::find($request->id);
$user->username=$request->username;
if($request->password!=NULL){

  $user->password==Hash::make($request->password);
}

$user->save();

return redirect()->back()->with('message', 'Student account info successfully updated!');

  }


  function editStudentProfile(Request $request){
    $request->validate([
      'first_name'=>'required',
      'last_name'=>'required',
      'level'=>'required',
    ]);
    
    $student=Student::find($request->student_id);
    $student->first_name=$request->first_name;
    $student->last_name=$request->last_name;
    $student->level_id=$request->level;
   
    
    $student->save();
    
    return redirect()->back()->with('message', 'Student account info successfully updated!');
    
      }

      function deleteStudentParent($parent){

        $parent= InvitedParent::find($parent);
        $user=$parent->user;

        $user->delete();
        $parent->delete();
        return redirect()->back()->with('message', 'Student parent deleted sucessfully');
      }

      function deleteStudent($student){

        $student= Student::find($student);
      

        $student->delete();
      
        return redirect()->back()->with('message', 'Student  deleted sucessfully');
      }
                 
}
