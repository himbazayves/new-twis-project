<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
Use App\School;
use App\User;
use App\Level;
use App\Teacher;
use App\Book;
use App\FavoriteBook;

class StudentController extends Controller
{


          
   public function __construct()
   {
       $this->middleware('auth');
   }


   function home(){
     
      $user=Auth::user();
      $student = $user->userable;

      $level=  $student->level->id;

      $books=Book::where('level_id',$level)
      ->orderBy('created_at', 'desc')
      ->take(5)
      ->get();

      //$books = Dogs::orderBy('id', 'desc')->take(5)->get();
    

    return view('student.home',['books'=>$books]);
   }

   function allBooks(){
      $user=Auth::user();
      $student = $user->userable;

      $level=  $student->level;

      $books=$level->books;
      return view('student.allBooks',['books'=>$books]); 
   }


function readBook($book){

$book=Book::find($book);
return view('student.readBook',['book'=>$book]);
   }


   function favoriteBook(){

      $user=Auth::user();
      $student = $user->userable;
      $books=$student->favoriteBooks;
   

    return view('student.favoriteBook',['books'=>$books]);            
   }




   function favoriteBookHandle($book){
      $book=Book::find($book);
      $user=Auth::user();
      $student = $user->userable;
      $newResult = FavoriteBook::updateOrCreate([
               
         'student_id'   => $student->id,
         'book_id'   =>$book->id,
     ]);

     return redirect()->back()->with('message', 'Sucessffly'.'  '. $book->name.'   '. 'added to favorite.');

   }
}
