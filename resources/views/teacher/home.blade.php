@extends('layouts.master')

@section('content')

@include('header.teacher') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                   <h3>Number of student</h3>

                   <div class="alert">54</div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection