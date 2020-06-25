@extends('layouts.master')

@section('content')
@include('header.student') 
<div style="margin-top:100px" class="container">





    <div class="row justify-content-center">
        <div class="col-md-6">

         
            <div class="card">


                <a href="#" class="button">Change password</a><br>
                

            <a href="{{route('accounts.changeAvatar')}}" class="button">Change profile picture</a><br>
                <a href="#" class="button">Change Account credentilas</a><br>
                <a href="#" class="button">Change Profile info</a>

            </div>
        </div>
        <div class="col-md-6">

         
            <div class="card">


                <div class="card-body">
                

                        <?php 
                        
                        $path=Auth::user()->avatar;
                        
                        ?>

  <center>   <img  style="width:170px ;margin-bottom:30px;border-radius: 50%;" class="img-fluid" src="{{asset($path)}}" alt="" />

</center>

                

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username}}" required autocomplete="username" autofocus readonly>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">First name</label>

                            <div class="col-md-6">
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$student->first_name}}" required autocomplete="first_name" autofocus readonly>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last name</label>

                            <div class="col-md-6">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="last_name" value="{{$student->last_name}}" required autocomplete="last_name" autofocus readonly>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Level</label>

                            <div class="col-md-6">
                            <input type="text" class="form-control @error('level') is-invalid @enderror" name="level" value="{{$student->level->id}}" required autocomplete="level" autofocus readonly>

                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

               

                    

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                               
                             


                                
                            </div>
                            

                        </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
