@extends('layouts.master')

@section('content')

@include('header.teacher') 



<div style="margin-top:100px" class="container">
    <div  class="row justify-content-center">
        <div class="col-lg-12">
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

        </div>
    </div>

    <div  class="row justify-content-center">
        <div class="col-lg-4">


<div class="card">
  <div class="card-header"> Student Profile</div>

    <div class="card-body">
        <?php 
                        
        $path=$student->user->avatar;
        
        ?>

<center>   <img  style="width:170px ;margin-bottom:30px;border-radius: 50%;" class="img-fluid" src="{{asset($path)}}" alt="" />

</center>

        
            <div class="form-group">
              <label for="exampleFormControlInput1">First Name</label>
              <input type="email" class="form-control" value=" {{$student->first_name}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Last Name</label>
                <input type="email" class="form-control" value=" {{$student->last_name}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Level</label>
                <input type="email" class="form-control" value=" {{$student->level->name}}" readonly>
            </div>
          
            <div class="form-group">
            <a data-toggle="modal" data-target="#profileInfo" class="button"><i class="fas fa-edit"></i> Edit </a>

          
            </div>

    </div>
</div>


        </div>
        <div class="col-lg-4">
 
            
<div class="card">
<div class="card-header"> Student Account Info</div>
    <div class="card-body">

            <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
                <input type="email" class="form-control" value=" {{$student->user->username}}" readonly>
              </div>
<div class="form-group">
            <a data-toggle="modal" data-target="#exampleModal" class="button"><i class="fas fa-edit"></i> Edit </a>

          
    </div>
        </div>
    </div>
</div>



        <div class="col-lg-4">
            
           

            <div class="card">
              <div class="card-header"> Student Parent Info</div>

                <div class="card-body">

                    @if( $student->invitedparent)
                        
                   
                    <div class="form-group">
                        <label for="exampleFormControlInput1">First Name</label>
                        <input type="email" class="form-control" value=" {{ $student->invitedparent->first_name}}" readonly>
                      </div>

                      
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Last Name</label>
                        <input type="email" class="form-control" value=" {{ $student->invitedparent->last_name}}" readonly>
                      </div>

                      
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone number</label>
                        <input type="email" class="form-control" value=" {{ $student->invitedparent->phone_number}}" readonly>
                      </div>


                      <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" value=" {{ $student->invitedparent->user->email}}" readonly>
                      </div>


                      <div class="form-group">
                        <a href="{{route('teacher.deleteStudentParent',$student->invitedparent->id)}}" class="button " style="background:red"><i class="far fa-trash-alt"></i> Delete Parent </a>
            
                      
                        </div>

                      @else

                      <a href="{{route('teacher.inviteParent',$student->id)}}" class="button"> Invite parent</a>

                      @endif

                      
                </div>
            </div>
            
        </div>
    </div>
    @if($student->results()->avg('score')==NULL)
    


    <div style="margin-top:20px;margin-bottom:20px" class="row justify-content-center">
        <div class="col-lg-12">
    

            <div class="card">
                <div class="card-header"> Student Complited Books</div>

                <div class="card-body">


                    @php
                    {{ $count=0;
                    
                        $quizzes=$student->results;
                    
                    
                    }}
                @endphp
                                    <table class="table">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th scope="col">#</th>
                                           
                                            <th scope="col">Book</th>
                                            <th scope="col">Time complited</th>
                                            <th scope="col">Scores</th>
                                           
                                         
                                          </tr>
                                        </thead>
                                        <tbody>
                
                                          @foreach($quizzes as $quiz)
                                          @php
                                              {{$count++;}}
                                          @endphp
                                          <tr>
                                          <th scope="row">{{$count}}</th>
                                        
                                          <td> <a href="{{route('student.readBook', $quiz->book->id)}}"  > {{$quiz->book->name}}</a></td>
                                            <td>{{$quiz->created_at->diffForHumans()}}</td>
                                            <td>
                                           <strong class=" @if($quiz->score > 7 ) text-success @else text-danger @endif" >   {{$quiz->score}} </strong>
                                            
                                            
                                         
                                     
                                          @endforeach
                
                                         
                                        </tbody>
                                      </table>
                                      

                </div>
            </div>


        </div>    
        @endif  

        

</div>


<!--  Student edit account info modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('teacher.editStudentAccount')}}">
@csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
        <input type="hidden" name="id" value="{{$student->user->id}}">
            <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
                <input type="text" class="form-control" value=" {{$student->user->username}}" name="username" required>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Password (if you do not want to change password remain it empty)</label>
                <input type="password" class="form-control"  name="password">
              </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="button" data-dismiss="modal" style="background:red">Close</button>
          <button type="submit" class="button">Save changes</button>
        </div>
   
      </div>
    </div>
</form>
  </div>


  <!-- end of  Student edit account info modal -->




  
<!--  Student edit profile info modal -->

<div class="modal fade" id="profileInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="post" action="{{route('teacher.editStudentProfile')}}">
@csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student Profile info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
      <input type="hidden" name="student_id" value="{{$student->id}}">
      <div class="form-group">
        <label for="exampleFormControlInput1">First Name</label>
        <input type="text" class="form-control" value=" {{$student->first_name}}" name="first_name" required>
      </div>
      <div class="form-group">
          <label for="exampleFormControlInput1">Last Name</label>
          <input type="text" class="form-control" value=" {{$student->last_name}}" name="last_name" required>
      </div>
      <div class="form-group">
          <label for="exampleFormControlInput1">Level</label>
         

          <select class="form-control" name="level" id="" required>

            <option value="{{$student->level->id}}" selected>{{$student->level->name}}</option>

            @foreach($levels as $level)
          <option value="{{$level->id}}">{{$level->name}}</option>
              
            @endforeach
          </select>
      </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="button" data-dismiss="modal" style="background:red">Close</button>
        <button type="submit" class="button">Save changes</button>
      </div>
 
    </div>
  </div>
</form>
</div>


<!-- end of  Student edit profile info modal -->


@endsection


