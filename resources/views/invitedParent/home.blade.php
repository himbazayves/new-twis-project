@extends('layouts.master')

@section('content')

@include('header.InvitedParent') 


<div style="margin-top:100px" class="container">
<div class="alert alert-success"> Hello, {{Auth::user()->userable->first_name}}. Have a nice moment!</div>
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
               
<div class="alert">  <center> <h5> Your Kid</h5></center>  </div>
                <div class="card-body">
                    
               

                <div class="alert">Names: {{$kid->first_name}} {{$kid->last_name}}</div>
                <div class="alert">School: {{$kid->school->name}} </div>

                </div>

                <div class="alert">  <center>  not your kid ?(<a href="#" class="text-primary">Report</a>) </center>  </div> 
            </div>
        </div>

    </div>
</div>

@endsection