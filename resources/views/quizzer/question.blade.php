@extends('layouts.master')

@section('content')

@include('header.student') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">

   

  
    @if(session()->has('limit'))
    <div class="alert alert-success">
        <h1>  Limit:  {{ session()->get('limit') }}
        </h1>
    </div>

@endif
 
<form method="post" action="{{route('quizzer.question_handle')}}">
    @csrf

    @foreach($question as $q)
<input type="text" value="{{$q->question}}">
        
    @endforeach
    <input type="hidden" name="book_id" @if(session()->has('book_id'))  value="{{ session()->get('book_id') }}" @endif >
    <input type="hidden" name="book_id" @if(session()->has('book_id'))  value="{{ session()->get('book_id') }}" @endif >
<input name="limit" type="text" @if(session()->has('limit'))  value="{{ session()->get('limit') }}" @else value="0" @endif >
<button class="button"  type="submit" value="submit" name="submit">Tangira question</button>
</form>  
    </div>
</div>

@endsection