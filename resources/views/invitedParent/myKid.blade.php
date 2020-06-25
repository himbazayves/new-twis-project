@extends('layouts.master')

@section('content')

@include('header.invitedParent') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
         
            <div class="card">
           

                <div class="card-header">My Kid     </div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">First Name</label>
                        <input type="email" class="form-control" value=" {{$kid->first_name}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">First Name</label>
                        <input type="email" class="form-control" value=" {{$kid->last_name}}" readonly>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlInput1">Level</label>
                        <input type="email" class="form-control" value=" {{$kid->level->name}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Teacher</label>
                        <input type="email" class="form-control" value=" {{$kid->teacher->name}}" readonly>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlInput1">Teacher E-mail</label>
                        <input type="email" class="form-control" value=" {{$kid->teacher->user->email}}" readonly>
                      </div>
                     
                     

                </div>
            </div>
        </div>

        <div class="col-md-8">


            @if($kid->results()->avg('score')!=NULL)
    


    <div style="margin-top:20px;margin-bottom:20px" class="row justify-content-center">
        <div class="col-lg-12">
    

            <div class="card">
                <div class="card-header"> Student Complited Books</div>

                <div class="card-body">


                    @php
                    {{ $count=0;
                    
                        $quizzes=$kid->results;
                    
                    
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
        
        
        @else 

        <div class="alert alert-warning">Your student have not yet complited to read any book</div>
        @endif  


        </div>
    </div>
</div>

@endsection