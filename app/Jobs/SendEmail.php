<?php

namespace App\Jobs;

use App\Models\Member;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $content;
    protected $to;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($content,$to)
    {
       $this->content = $content;
       $this->to = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $contents = $this->content;
        $num = Mail::raw($contents, function($message) {
            $message->from(config('mail.from.address'), config('mail.from.name'));
            $message->subject('吕梁市委通知');
            $message->to($this->to);

        });
    }
}
