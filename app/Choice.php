<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = [
        'choice','Question_id'
    ];

  


    function  question(){

        return $this->belongsTo(Question::class);
      }
}
