@extends('layouts.master')

@section('content')

@include('header.student') 


<div style="margin-top:100px" class="container">

    @if(session()->has('message'))
    <div class="row justify-content-center">
    
            
        <div class="col-md-12">

          
<div class="alert alert-success message">

<i class="fas fa-check-circle text-success"></i> {{ session()->get('message') }}
</div>

        </div>
    </div>  
    @endif


    <div style="margin-bottom:10px" class="row justify-content-center">

      <div class="col-md-12"> 
        <div class="form-group">
      <input class="form-control" type="text" placeholder="shaka igitabo" > 
      </div>

    </div>
  </div>
    <div class="row justify-content-center">

         
    

@foreach($books as $book)

<div class="col-md-6">
            
  <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="{{ Voyager::image($book->cover) }}" alt="Card image cap">
      <div class="card-body">
      <h5 class="card-title">{{$book->name}}</h5>
      <p class="card-text">{{$book->summary}}</p>
     

      <div class="btn-group" role="group" aria-label="Basic example">
        <a style="border:1px solid orange;background:orange"  href="{{route('student.readBook', $book->id)}}" class="">Read</a>
        <a style="" href="{{route('student.favoriteBookHandle', $book->id)}}" class="bg-primary">Add to favorite</a>
      
      </div>

      </div>
    </div>
  
@endforeach
       


    </div>
</div>


  
@endsection