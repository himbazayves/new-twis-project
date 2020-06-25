<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'level_id','author','name','book','summary'
    ];


    function  level(){


        return $this->belongsTo(Level::class);
      }


      function  questions(){


        return $this->hasMany(Question::class);
      }


      function  results(){


        return $this->hasMany(Result::class);
      }

      
  function  favoriteBooks(){


    return $this->hasMany(FavoriteBook::class);
  }
}
