@extends('layouts.master')

@section('content')

@include('header.student') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">

@foreach($books as $book)

<div class="col-md-6">
            
  <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="{{ Voyager::image($book->cover) }}" alt="Card image cap">
      <div class="card-body">
      <h5 class="card-title">{{$book->name}}</h5>
      <p class="card-text">{{$book->summary}}</p>
      <a href="{{route('student.readBook', $book->id)}}">Read</a>
      </div>
    </div>
  
@endforeach
       


    </div>
</div>

@endsection