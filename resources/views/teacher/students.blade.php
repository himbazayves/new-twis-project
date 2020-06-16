@extends('layouts.master')

@section('content')

@include('header.teacher') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('teacher.new_student')}}" class="button">New student</a>
            <div class="card">
           

                <div class="card-header">My Students      </div>

                <div class="card-body">
                    

@php
    {{ $count=0;}}
@endphp
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Username</th>
                            <th scope="col">Parent</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($students as $student)
                          @php
                              {{$count++;}}
                          @endphp
                          <tr>
                          <th scope="row">{{$count}}</th>
                          <td>  <img height="85px"  width="85px" src="{{ Voyager::image($student->user->avatar) }}" alt="">  </td>
                          <td>{{$student->first_name}}</td>
                            <td>{{$student->first_name}}</td>
                            <td>
                              {{$student->user->username}}
                            
                            
                            </td>
                            <td>   
                              
                              @if($student->invitedparent==NULL)
                               NO
                                @else
                                <i class="fas fa-check-circle text-success"></i>
                              @endif
                            
                            
                            </td>
                          <td> <a href="{{route('teacher.inviteParent',$student->id)}}"> invite parent</a> </td>
                          </tr>
                     
                          @endforeach

                         
                        </tbody>
                      </table>
                      
                     

                </div>
            </div>
        </div>
    </div>
</div>

@endsection