<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $content)
    {
        $this->name = $name;
        $this->content = $content;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {

        $test = $this->content;

        return $this->from('from_email@gmail.com', 'RMUTI')->subject('รายงานการจองห้อง')->view('email', compact('test'))->with("name", $this->name);

    }
}
