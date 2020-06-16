@extends('layouts.master')

@section('content')

@include('header.student') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">



<div class="col-md-12">
<?php 
$file = (json_decode($book->book)[0]->download_link);
?>
<embed  src="{{ Voyager::image($file) }}" height="600px"  width="100%"/> 


    </div>
  

<a href="{{route('quizzer.home',$book->id)}}" class="button"> Finish</a>


    </div>
</div>

@endsection