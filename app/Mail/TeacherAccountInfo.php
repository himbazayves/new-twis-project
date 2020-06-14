<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeacherAccountInfo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('mugiranezahimbazayves@gmail.com', 'TWIS')
                ->view('vendor.maileclipse.templates.teacherAccount')
                ->subject('Twis new account')
                ->with([ 'password' => $this->data['password'] ,'username' => $this->data['username'] ]);
        //return $this->view('view.name');
    }
}
