<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'level_id','school_id' ,'teacher_id'
    ];

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
  function  school(){

    return $this->belongsTo(School::class);
  }


  function  level(){


    
    return $this->belongsTo(Level::class);
  }



  function  teacher(){



    return $this->belongsTo(Teacher::class);
  }


  public function invitedParent()
  {
      return $this->hasOne('App\InvitedParent');
  }

}
