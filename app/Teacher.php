<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'level_id','school_id','name'
    ];

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
  function  school(){


    return $this->belongsTo('App\School');
  }

  function  level(){


    return $this->belongsTo(Level::class);
  }

  function  students(){


  
    return $this->hasMany(Student::class);
  }

    
    
}
