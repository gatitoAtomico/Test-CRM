<?php

namespace App\Console\Commands;

use App\Clients;
use App\Mail\BirthdayEmail;
use App\Telephones;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending a birthday email daily to every client that has birthday';

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
        $i = 0;
        $users = Clients::whereMonth('dob', '=', date('m'))->whereDay('dob', '=', date('d'))->get();
        $emails = array();

        foreach($users as $user)
        {
            array_push($emails,$user->email);
            Mail::to($user->email)->send(new BirthdayEmail());
            $i++;
        }
        $this->info(' Birthday messages sent successfully to '.json_encode($emails).'!');
    }
}
