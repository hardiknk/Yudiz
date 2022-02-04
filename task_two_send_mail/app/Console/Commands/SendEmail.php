<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notify {user_email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify The User By Mail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function sendMail($users)
    {
        // $user_emails = $users->email;
        // echo '<pre>'; print_r($users); exit;
        Mail::raw('Hi, Welcome Hardik! first email', function ($message) use ($users) {
            $message->to($users, 'hardikk')
                ->subject("Welcome To  The Yudiz YopMail ");
        });
    }
    public function handle()
    {
        $email =  $this->argument('user_email');

        if (!empty($email)) {
            if ($this->confirm('Are You Sure Want To Send Email?')) {
                $this->sendMail($email);
            } else {
                $this->info("Mail Is Discard");
            }
        } else {
            $users = $this->withProgressBar(User::all(), function ($user) {
                $this->sendMail($user->email);
            });
        }



        // $this->info($users);
    }
}
