@extends('layouts.master')

@section('content')

@include('header.student') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">



<div class="col-md-6">
            
  <div class="card" style="width: 18rem;">
      

    @if(session()->has('score'))
    <div class="alert alert-success">
        <h1>  Your scores:  {{ session()->get('score') }}
        </h1>
    </div>
@endif


      </div>
    </div>

<div> <a class="button" href="{{route('quizzer.review', $book)}}">Rewiew book</a></div> 


    </div>
</div>

@endsection