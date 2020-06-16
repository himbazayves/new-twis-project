@extends('layouts.master')

@section('content')

@include('header.student') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <div class="card">
           

                <div class="card-header">My Students      </div>

                <div class="card-body">

                <form method="post" action="{{route('quizzer.final_handle')}}">
                    @csrf
                
                <input type="hidden" name="book_id" value="{{$book_id}}">
                    @foreach($questions as $q)
                
                      <p>{{$q->question}}</p> 
                      
                     

                      @foreach($q->choices as $c)
                      <div class="alert alert-dark"> 

                        <label for="{{$c->choice}}"> {{$c->choice}} </label><br>
                      <input type="radio" id="female" name="{{$c->question->id}}" value="{{$c->isCorrect}}">
                    
                    </div>
                      @endforeach

                     
                        @endforeach

                        <button class="button"  type="submit" value="submit" name="submit">Tangira question</button>
                </form>

                

                </div>
            </div>
        </div>
    </div>
</div>
</div>

   

  
    
 


@endsection