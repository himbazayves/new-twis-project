@extends('layouts.master')

@section('content')

@include('header.school') 


<div style="margin-top:100px" class="container">

    <div class="alert alert-success"> New student</div>
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

  @if(session()->has('errors'))
  <div class="alert alert-danger ">
      
    <i class="fas fa-check-circle text-success"></i> {{ session()->get('errors') }}
    </div>
  @endif
    <div class="row justify-content-center">

        

        <div class="col-md-6">
            
           
  

            

            <div class="card ">
                <div class="alert alert-light">Create many student at time Using excel</div>

                <div class="card-body">


                    <form method="POST" action="{{ route('teacher.new_student_handle') }}" enctype="multipart/form-data">
                        @csrf

           

                   

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Excel file</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" required autocomplete="file">

                            <span> <a href="{{asset('teacherStudent/sampleSheet/sa.csv')}}"> <strong>Download templete</strong> </a></span>
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                           
                        </div>

                       


                       

                   

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                
                                <button  type="submit" class="">
                                 Upload file
                                 </button>
                            </div>
                        </div>


                        
                        
                    </form>

                </div>

            </div>

        </div>





        <div class="col-md-6">
            

           

            

            <div class="card ">
              
                <div class="alert alert-light">Create one student manual</div>
  
                <div class="card-body">
                    <form method="POST" action="{{ route('teacher.new_student_handle_manual') }}">
                        @csrf

           

                   

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Student First names</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            
                       
                       
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Student last name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            
                       
                       
                        </div>

                       


                       

                   

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                
                                <button  type="submit" class="">
                                 Create Student
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