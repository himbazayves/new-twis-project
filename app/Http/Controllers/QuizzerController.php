<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\question;
use App\Choice;
use App\User;
use Auth;
use Student;
use App\Result;
use DB;

class QuizzerController extends Controller
{

            
    public function __construct()
    {
      $this->middleware('auth');
    }

function home($book){
$book_id=$book;

return view('quizzer.home',['book_id'=>$book_id]);
    }


function question($book){

//$limit=0;

$questions=Book::find($book)->questions;
$book_id=$book;
return view('quizzer.questions',['questions'=>$questions, 'book_id'=>$book_id]);   
    }


    


    function question_handle (Request $request){

      $limit=$request->input('limit');  
      $submit=$request->input('submit');
      $book_id=$request->input('book_id');
      
     
      $count_book= $question=DB::table('questions')
      -> where('book_id', $book_id)
      ->count();
      $request->session()->put('count_book', $count_book);
      $request->session()->put('book_id', $book_id);


        if($request->input('submit') != NULL)
{
    $limit++;

    
   
}
      
$request->session()->put('limit', $limit);

    //$request->session()->put('limit', $limit);

    //$limit=$request->session()->get('limit');

       // return back()->with('limit',$limit);
       

 

       if($limit==($count_book-1)){

return redirect()->route('quizzer.final');
       }


       else{

        
       $question=DB::table('questions')
       -> where('book_id',   $request->session()->get('book_id'))
        ->get()
        ->skip($request->session()->get('limit'))->take(1);
        return view('quizzer.question',['question'=>$question])->with('limit', $request->session()->get('limit'))
        ->with('book_id',   $request->session()->get('book_id'));
       }
    
    }


    
    function final (){


     
        return view('quizzer.final');   
            }

 
            function final_handle (Request $request){
             $book=$request->input('book_id');
             $input= $request->all();
             $answers=[];
             $score=0;
                 
                $questions=Book::find($book)->questions;


                foreach($questions as $q){

                    array_push($answers, $input[$q->id] );
                  
                }
            
              // $input= $request->all();

               foreach($answers as $a){

                if ($a==1){
                    $score++;

                }
               
               };

               $request->session()->put('score', $score);
               $user =User::find(Auth::user()->id);

                $student=$user->userable;
            

               $newResult = Result::updateOrCreate([
               
                'student_id'   => $student->id,
                'book_id'   =>$book,
            ],[
                'score'     => $request->session()->get('score'),
               
            ]);

     return view('quizzer.final',['book'=>$book])
      ->with('score', $request->session()->get('score')); 

                    }

            
    function review ($book){
     $book=Book::find($book);
    $questions=$book->questions;

     
        return view('quizzer.review',['questions'=>$questions,'book'=>$book]);   
            }


            function studentQuizzes(){
                $user =User::find(Auth::user()->id);

                $student=$user->userable;
                $quizzes=$student->results;


                return view('quizzer.studentQuizzes',['quizzes'=>$quizzes]);




               
            }
}
