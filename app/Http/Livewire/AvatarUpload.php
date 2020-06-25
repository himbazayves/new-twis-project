<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;
use App\User;

class AvatarUpload extends Component
{
    use WithFileUploads;

    public $avatar;



    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function save()
    {
       
       
       
      




        
       
        $filename = $this->avatar->store('storage/users','public_uploads');
        $user=Auth::user();
        $user->avatar=$filename;
        $user->save();
  
        session()->flash('message', 'Image successfully updated.');
    }

    public function render()
    {
        return view('livewire.avatar-upload');
    }
}
