<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Digest extends Mailable
{
    use Queueable, SerializesModels;
    public $posts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($posts){
        $this->posts = $posts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.digest')->with(['posts' => $this->posts]);
    }
}
