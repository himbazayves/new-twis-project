@extends('layouts.master')

@section('content')

@include('header.student') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <div class="card">
           

                <div class="card-body">
                    

@php
    {{ $count=0;}}
@endphp
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                           
                            <th scope="col">Igitabo</th>
                            <th scope="col">Igihe</th>
                            <th scope="col">Amanota</th>
                            <th scope="col">Review</th>
                         
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
                            
                            
                            </td>
                            
                          <td> <a href="{{route('quizzer.review', $quiz->book->id)}}" class="button"> Review</a> </td>
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