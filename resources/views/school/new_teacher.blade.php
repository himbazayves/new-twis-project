@extends('layouts.master')

@section('content')

@include('header.school') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            

  @if(session()->has('message'))
  <div class="alert alert-success message">
      
    <i class="fas fa-check-circle text-success"></i> {{ session()->get('message') }}
    </div>
  @endif



  @if(session()->has('warning'))
  <div class="alert alert-warning ">
      
    <i class="fas fa-check-circle text-success"></i> {{ session()->get('warning') }}
    </div>
  @endif

            <div class="alert alert-success"> New teacher</div>

            <div class="card ">
              

                <div class="card-body">
                    <form method="POST" action="{{ route('school.new_teacher_handle') }}">
                        @csrf

           

                   

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Teacher E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       


                       

                   

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                
                                <button  type="submit" class="">
                                 Create Teacher
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