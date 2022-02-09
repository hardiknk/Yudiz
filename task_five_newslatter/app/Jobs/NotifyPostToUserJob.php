<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class NotifyPostToUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user_data;
    public $post_description;
    public $post_title;

    public function __construct($user_data, $post_description, $post_title)
    {
        $this->user_data = $user_data;
        $this->post_description = $post_description;
        $this->post_title = $post_title;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $this->user_data = $user_data;
        $post_title = $this->post_title;
        $post_description = $this->post_description;

        // echo '<pre>'; print_r($this->user_data); exit;
        foreach ($this->user_data as $value) {
            //trim because some time email is laft /r/n so rfc error comes
            $user_email = trim($value->user_email);
            $data = array(
                "url" => URL::signedRoute('unsubscribe', ["email" => $user_email]),
                "post_description" => $post_description,
                "title" => $post_title,
            );

            Mail::send('mail', $data, function ($message) use ($user_email, $post_title) {
                $message->to($user_email)
                    ->subject("New Post Created '" . $post_title . "' ");
            });
        }
    }
}
