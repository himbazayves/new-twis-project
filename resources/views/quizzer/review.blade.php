@extends('layouts.master')

@section('content')

@include('header.student') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">

        
        <div class="col-md-6">
            
            <div class="card ">
           


                <div class="card-body">
            <?php 
            $file = (json_decode($book->book)[0]->download_link);
            ?>
            <embed  src="{{ Voyager::image($file) }}" height="600px"  width="100%"/> 
            
        </div>
    </div>
      </div>
              
            
          
            
            
              

        <div class="col-md-6">



  
            <div class="card ">
           


                <div class="card-body">

<?php  $count=1; ?>

              
                
                
                    @foreach($questions as $q)
                
                      <p><h3> <strong> {{$count++}}.{{$q->question}} ?  </strong></h3></p> 
                      

                      @foreach($q->choices as $c)
                      <div class="alert alert-light"> 

                      <div class="form-check">
                       

                        
                         <label class="form-check-label  @if($c->isCorrect==1) text-success  @else text-danger @endif" for="{{$c->choice}}">
                            {{$c->choice}}
                        </label>
                        
                      
                      </div>

                    </div>
                   
                    @endforeach
                     
                    
                  
                  

                     
                        @endforeach

                   

                </div>
            </div>
        </div>
    </div>
</div>
</div>


  
    
 


@endsection