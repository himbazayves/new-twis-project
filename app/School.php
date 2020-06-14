<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //

    protected $fillable = [
        'phone','address', 'name'
    ];


    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }


    function  teachers(){


        
        return $this->hasMany(Teacher::class);
      }



      function  students(){


       
        return $this->hasMany(Student::class);
      }
    
}
