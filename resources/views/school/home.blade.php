@extends('layouts.master')

@section('content')

@include('header.school') 


<div style="margin-top:100px" class="container">
@if($bookingsOfUser->isEmpty())
<div class="alert alert-danger"> You do not have an active subsription  <a href="{{route('subscription.plans')}}"> click here to activate one</a> </div>
@endif
  


    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="alert alert-success "> New teacher</div>

            <div class="card">
              
                <div class="card-body">
                    <form method="POST" action="{{ route('school.complete_registration_handle') }}">
                        @csrf

           

                   

                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">School name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right"> School Phone number</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right"> Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                   

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Complete Plofile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection