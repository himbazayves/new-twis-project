@extends('layouts.master')

@section('content')

@include('header.teacher') 


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
      
    <i class="fas fa-exclamation-circle text-warning"></i> {{ session()->get('warning') }}
    </div>
  @endif

            <div class="alert alert-success"> Invite parent</div>

            <div class="card ">
              

                <div class="card-body">
                    <form method="POST" action="{{ route('teacher.inviteParentHandle') }}">
                        @csrf

           

                    <input type="hidden" name="student_id" value="{{$student}}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Parent E-mail</label>

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
                                
                                
                                <button  type="submit" class="button">
                          Invite Parent
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