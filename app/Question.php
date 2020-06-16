<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question','book_id'
    ];

  


    function  choices(){

        return $this->HasMany(Choice::class);
      }


      function  book(){

        return $this->belongsTo(Book::class);
      }
}
