<?php

namespace App\Console\Commands;

use ATDev\RocketChat\Channels\Channel;
use ATDev\RocketChat\Chat;
use ATDev\RocketChat\Ims\Im;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RocketSetOnline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rocket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Chat::setUrl("https://open.rocket.chat");
        $result = Chat::login("asternov97", "kba333ap");
        $user = new \ATDev\RocketChat\Users\User('4fBJa8LZyP6hSSNoq');
        $statusResult = $user->setStatusValue('online');
//        $statusResult = $user->getStatus();
//        $listing = Channel::listing();
////        $im = Im::listEveryone();
//        $message = new \ATDev\RocketChat\Messages\Message();
//        $message->setRoomId("andrew");
//        $message->setText("Message text");
//        $result = $message->postMessage();
        var_export($statusResult);
        if (!$result) {
            info('errrroer', [Chat::getError()]);
        } else {
            var_export('hello');
        }

        info('start rocket script', [Carbon::now()]);

        return 0;
    }
}
