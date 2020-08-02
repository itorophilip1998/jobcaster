<?php

namespace App\Mail;

use App\Posting;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplyJob extends Mailable
{
    use Queueable, SerializesModels;
    public $data; 
    public $manager;
    public $company;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$manager,$company)
    {
         $this->data = $data;
         $this->manager = $manager;
         $this->company = $company;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $manager=User::where('id',$this->data['manager_id'])->first();
        // $company=Posting::where('managers_id',$this->data['manager_id'])->first(); 
        return $this->from($this->data['email'],'JobCaster')->subject('Job Application Alert')
        ->attach($this->data['cv']->getRealPath(), array(
            'as' => $this->data['cv']->getClientOriginalName(), 
            'mime' => $this->data['cv']->getMimeType())
        )
        ->view('email.applyjobs')
        ->with('data', $this->data)
        ->with('manager',  $this->manager)
        ->with('company',  $this->company);
    }
}
