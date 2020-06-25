@extends('layouts.master')

@section('content')
@include('header.invitedParent') 
<div style="margin-top:100px" class="container">





    <div class="row justify-content-center">
        <div class="col-md-4">

         
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


 <div class="alert"> <center> Profile information</center></div>
                

                    
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">First name</label>

                            <div class="col-md-6">
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$invitedParent->first_name}}" required autocomplete="first_name" autofocus readonly>

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
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="last_name" value="{{$invitedParent->last_name}}" required autocomplete="last_name" autofocus readonly>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



               

                     <div style="margin-bottom:100px" class="alert"><center> Acount information</center>
                    
                    
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{Auth::user()->username}}" required autocomplete="username" autofocus readonly>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{Auth::user()->email}}" required autocomplete="username" autofocus readonly>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    
                    </div>
                    
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
