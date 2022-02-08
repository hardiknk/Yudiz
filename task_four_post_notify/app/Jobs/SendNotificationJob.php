<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $post_name;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$post_name)
    {
        // echo '<pre>'; print_r("hello hardik job call"); exit;
        // echo '<pre>'; print_r($user); exit;

        $this->user = $user;
        $this->post_name = $post_name;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        // echo '<pre>'; print_r("hello hardik job is call"); exit;
        // $user_email = $this->user;
        // echo '<pre>'; print_r($this->user); exit;
        // echo '<pre>'; print_r($this->post_name); exit;
        // $user_email = "hardik.kanzariya@yudiz.com";
        $post_name =$this->post_name;
        foreach ($this->user as $key => $value) {
            # code...
            $user_email = $value->email;
            Mail::raw('Hi, Welcome Hardik!', function ($message) use ($user_email,$post_name) {
                $message->to($user_email)
                    ->subject("User Create New Post '".$post_name."'  Email '".$user_email."' ");
            });
        }
    }
}
