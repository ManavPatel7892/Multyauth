<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
class Testcron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'testing cron and jod';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = array('data'=>'job adn cron testing');
        Mail::send('mail',$data,function($message){
            $message->to('manavmakvana8@gmail.com')
            ->subject('job and cron testing mail');
        });
    }
}
