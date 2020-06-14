@extends('layouts.master')

@section('content')

@include('header.teacher') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('teacher.complete_registration_handle') }}">
                        @csrf

           

                   

                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Your names</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right"> Your level</label>

                            <div class="col-md-6">
                                



                            <select name="level" id="level" class="form-control @error('level') is-invalid @enderror" name="level" required autocomplete="level">
                            
                                <option value="" selected disabled>Select level .... </option>

                                  @foreach($levels as $level)


                                <option value="{{$level->id}}">{{ $level->name }}</option>
                                      
                                  @endforeach

                                
                            
                            </select>

                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        

                   

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit">
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