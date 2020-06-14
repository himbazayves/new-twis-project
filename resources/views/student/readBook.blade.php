@extends('layouts.master')

@section('content')

@include('header.student') 


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">



<div class="col-md-12">
            

     
          <?php 
$file = (json_decode($book->book)[0]->download_link);

//$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
//echo $file;

//var_dump(json_decode($file));
?>


    
<?php 

//$file="localhost:8000"."/" ."storage".$file;
//echo $file ;
?>


<?php
//$filename = 'temp-image.jpg';
//$tempImage = tempnam(sys_get_temp_dir(), $filename);
//copy('https://my-cdn.com/files/image.jpg', $tempImage);

//return response()->download($tempImage, $filename);

?>



   
  







      
<embed  src="{{ Voyager::image($file) }}" height="600px"  width="100%"/> 


    </div>
  

       


    </div>
</div>

@endsection