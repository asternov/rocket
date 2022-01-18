<?php

namespace App\Console\Commands;

use ATDev\RocketChat\Channels\Channel;
use ATDev\RocketChat\Chat;
use ATDev\RocketChat\Ims\Im;
use Carbon\Carbon;
use Illuminate\Console\Command;
use WebSocket\Client;

class RocketSocket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'socket';

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
        $client = new Client("wss://hellochat.ru/sockjs");
        $client->close();
        return 0;
    }
}
