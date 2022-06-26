<?php

namespace App\Jobs;

use App\Jobs\CustomerJob;
use App\Mail\Sendmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CustomerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $name;
    protected $content;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($email, $name, $content)
    {
        //
        $this->email = $email;
        $this->name = $name;

        $this->content = $content;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        Mail::to($this->email['email'])->send(new Sendmail($this->name['name'], $this->content['content']));

    }
}
