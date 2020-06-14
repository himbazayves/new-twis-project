@extends('layouts.master')

@section('content')



@include('header.school') 


  

<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        
        
            @foreach($plans as $plan)
            <div class="columns col-md-4">
                <ul class="price">
                <li class="header bg-primary">{{$plan->name}}</li>
                  <li class="grey">$ {{$plan->price}} / Month</li>
                  <li>10GB Storage</li>
                 
               
                <li class="grey"><a href="{{route('subscription.subscribe',$plan->id)}}"  style="background: #faad3b"  class="button">Sign Up</a></li>
                </ul>
              </div>
            @endforeach
   
</div>
</div>

@endsection