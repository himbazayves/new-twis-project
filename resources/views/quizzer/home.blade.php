@extends('layouts.master')

@section('content')

@include('header.student') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">



<div class="col-md-6">
            
  quizer



<a  href="{{route('quizzer.question',$book_id)}}"> start quiz</a>
    </div>
</div>

@endsection