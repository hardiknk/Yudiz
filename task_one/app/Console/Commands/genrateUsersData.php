<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class genrateUsersData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:generate-user {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Create A Fack User Data';

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
    public function handle()
    {
        $usersData = $this->argument('count');
        // return $this->info("User Data Arguments".$usersData);
        for ($i = 0; $i < $usersData; $i++){
            User::factory()->create();
        }   
    }
}
