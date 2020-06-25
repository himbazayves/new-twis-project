<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'student_id','book_id' ,'score'
    ];


    function  book(){


        return $this->belongsTo('App\Book');
      }


      function  student(){


        return $this->belongsTo('App\Student');
      }
}
