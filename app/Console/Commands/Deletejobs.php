<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class Deletejobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deletejobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'force-deletes all softly-deleted posts for more than 30 days.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

            $posts = Post::whereNotNull('deleted_at')->where(
                'deleted_at', '<=', now()->subDays(30)->toDateTimeString()
            )->get();

            $posts->each->forceDelete();

        return Command::SUCCESS;
    }
}
