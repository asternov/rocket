<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

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
    protected $description = 'Command RocketSetOnline';

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
        set_time_limit(11 * 60 * 60);
        $process = new Process(['node', 'rocket-ping.js']);
        //$process->run();

        return 0;
    }
}
