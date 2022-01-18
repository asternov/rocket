<?php

namespace App\Console\Commands;

use ATDev\RocketChat\Chat;
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
        Chat::setUrl("https://open.rocket.chat"); // No trailing /

// Now, login
        $result = Chat::login("andrew", "kba333ap");

        $this->output->writeln(var_export(Chat::getResponse()));
        if (!$result) {

            Chat::getError();
        }

        return 0;
    }
}
