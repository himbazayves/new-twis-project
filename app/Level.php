<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
       'name'
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
 
    public function students()
    {
        return $this->hasMany(Student::class);
    }


    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
