<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteBook extends Model
{
    protected $fillable = [
        'student_id','book_id' 
    ];


    function  book(){


        return $this->belongsTo('App\Book');
      }


      function  student(){


        return $this->belongsTo('App\Student');
      }
}
