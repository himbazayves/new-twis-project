<?php

namespace App\Parsers;

use App\Models\User;
use Cyberduck\LaravelExcel\Contract\ParserInterface;

class Excel implements ParserInterface
{
    public function transform($row, $header)
    {
        $user = new user();
      

        $user->username=$row[0];
        $user->email=$row[1];
        $user->userable_type='App\Student';
   
        $user->password=Hash::make($random_password);
       
        // We can manunipulate the data before returning the object
        //$model->field3 = new \Carbon($row[2]);
        return $user;
    }
}