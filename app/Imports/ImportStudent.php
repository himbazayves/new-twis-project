<?php

namespace App\Imports;

use App\User;
use App\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;
use Hash;
class ImportStudent implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   


    private $data; 
    private $userable_id;

    public function __construct(array $data = [])
    {
        $this->data = $data; 
    }


    public function collection(Collection $rows)
    {

        Validator::make($rows->toArray(), [
            '*.0' => 'required',
            '*.1' => 'required',
        ])->validate();


        foreach ($rows as $row) 
        {

             $student = new Student;
             $student->first_name=@$row[0];
             $student->last_name=@$row[1];
             $student->level_id=$this->data['level_id'];
             $student->teacher_id=$this->data['teacher_id'];
             $student->school_id=$this->data['school_id'];

             $student->save();

             $username=@$row[0];

             $check_username = User::where('username', $username)->count();
             if($check_username < 1){

               $username=$username;
             }



             else{
                $continue = true;
                while ($continue) {
                   $permitted_char = 'abcdefghijklmnopqrstuvwxyz12345678ABCDEFGHUJKLMNOPKLSXWZ';
                
                   $random_useranme= substr(str_shuffle($permitted_char), 0, 5);
                    $username= $username.$random_useranme ;   
                   $check_username = User::where('username', $username)->count();
                
                        if ($check_username < 1)
                            $continue = false;
                
                            $username=$username;
                 }


             }
            

              $user= new User;
              $user->username=$username;
              $user->userable_type='App\Student';
              $user->userable_id=$student->id;
              $user->password=Hash::make(123);
  
              $user->save();
          
        }
    }
}




