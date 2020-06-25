@extends('layouts.master')

@section('content')
@include('header.teacher') 
<div style="margin-top:100px" class="container">





    <div class="row justify-content-center">
        <div class="col-md-3">

         
            <div class="card">


                <a href="#" class="button">Change password</a><br>
                

            <a href="{{route('accounts.changeAvatar')}}" class="button">Change profile picture</a><br>
                <a href="#" class="button">Change Account credentilas</a><br>
            <a href="{{route('accounts.changePesonalInfo')}}" class="button">Change Personal info</a>

            </div>
        </div>









        <div class="col-md-4">

         
            <div class="card">
                <div class="alert"> Persanal info </div>

                <div class="card-body">
                

                        <?php 
                        
                        $path=Auth::user()->avatar;
                        
                        ?>

  <center>   <img  style="width:170px ;margin-bottom:30px;border-radius: 50%;" class="img-fluid"  src="{{asset($path)}}"  alt="" />

</center>

                

                   
                     

                        
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right"> Names</label>

                            <div class="col-md-8">
                            <input type="text" class="form-control bg-white @error('username') is-invalid @enderror" name="last_name" value="{{$teacher->name}}" required autocomplete="last_name" autofocus readonly>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Level</label>

                            <div class="col-md-8">
                            <input type="text" class="form-control bg-white @error('level') is-invalid @enderror" name="level" value="{{$teacher->level->name}}" required autocomplete="level" autofocus readonly>

                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

               

                    

                 
                </div>
            </div>
        </div>



        
        <div class="col-md-5">

         
            <div class="card">
<div class="alert">Account info</div>

                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                    <div class="col-md-8">
                    <input id="username" type="username" class="form-control bg-white @error('username') is-invalid @enderror" name="username" value="{{$user->username}}" required autocomplete="username" autofocus readonly>

                       
                    </div>
                </div>



                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label text-md-right">E-mail</label>

                    <div class="col-md-8">
                    <input id="username" type="username" class="form-control bg-white @error('username') is-invalid @enderror" name="username" value="{{$user->email}}" required autocomplete="username" autofocus readonly>

                       
                    </div>
                </div>



            </div>
        </div>

    </div>
</div>
@endsection
