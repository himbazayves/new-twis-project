<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
Use App\School;
use App\User;
use App\Level;
use App\Teacher;
use App\Book;

class StudentController extends Controller
{


          
   public function __construct()
   {
       $this->middleware('auth');
   }


   function home(){
     
      $user=Auth::user();
      $student = $user->userable;

      $level=  $student->level;

      $books=$level->books;

 
    

    return view('student.home',['books'=>$books]);
   }


function readBook($book){

$book=Book::find($book);
return view('student.readBook',['book'=>$book]);
   }
}
