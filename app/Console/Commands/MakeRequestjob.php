<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRequestjob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makeRequestjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' runs every six hours and makes HTTP Request';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $httpReq = ;
        return Command::SUCCESS;
    }
}
