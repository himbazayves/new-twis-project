@extends('layouts.master')

@section('content')

@include('header.student') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
  <div class="alert alert-primary"> <p id="demo"></p></div> 
            <div class="card ">
           


                <div class="card-body">

<?php  $count=1; ?>

                <form method="post" action="{{route('quizzer.final_handle')}}">
                    @csrf
                
                <input type="hidden" name="book_id" value="{{$book_id}}">
                    @foreach($questions as $q)
                
                      <p><h3> {{$count++}}.{{$q->question}} ?</h3></p> 
                      

                      @foreach($q->choices as $c)
                      <div class="alert alert-light"> 

                      <div class="form-check">
                        <input class="form-check-input" type="radio"  name="{{$c->question->id}}" value="{{$c->isCorrect}}">
                        <label class="form-check-label" for="{{$c->choice}}">
                            {{$c->choice}}
                        </label>
                      </div>

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


<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

  
    
 


@endsection