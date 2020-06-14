<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvitedParent extends Model
{
    protected $fillable = [
        'first_names','phone_number','last_name'
    ];

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }


    function  student(){

        return $this->belongsTo(Student::class);
      }
}
