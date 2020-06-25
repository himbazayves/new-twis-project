@extends('layouts.master')

@section('content')

@include('header.teacher') 


<div style="margin-top:100px" class="container">
    <div class="alert alert-success"> Hello , {{Auth::user()->userable->name}}. Have a nice moment!</div>
    <div class="row justify-content-center">
   
        <div style="margin-top:10px" class="col-md-6">
            <div class="card">
              

                <div class="card-body">
                   <h3>Number of students</h3>

                   <div class="alert"> <a href="#">5</a></div>
                </div>
            </div>

        </div>

        <div  style="margin-top:10px"class="col-md-6">
            <div class="card">
              

                <div class="card-body">
                   <h3>Student with read many books</h3>

                   <div class="alert">  <a href="#">Ishimwe olivier</a> </div>
                </div>
            </div>

        </div>

    </div>

    <div class="row justify-content-center">
   
        <div style="margin-top:10px" class="col-md-6">
            <div class="card">
              

                <div class="card-body">
                   <h3>High performer student</h3>

                   <div class="alert"> <a href="#">Himbaza Yves </a></div>
                </div>
            </div>

        </div>

        <div style="margin-top:10px" class="col-md-6">
            <div class="card">
              

                <div class="card-body">
                   <h3>Low performer student</h3>

                   <div class="alert">  <a href="#">Ishimwe olivier</a> </div>
                </div>
            </div>

        </div>

    </div>



</div>

@endsection