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

class SendTestMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public User $user; 
    public function __construct(User $user)
    {
        $this->user = $user;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    //in this handle function we are writing the custome code
    public function handle()
    {
        //
        $user_email = $this->user->email;
        Mail::raw('Hi, Welcome Hardik!', function ($message) use($user_email){
            $message->to($user_email)
                ->subject("Welcome To  The Yudiz Hardik");
        });
    }
}
