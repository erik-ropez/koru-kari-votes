<?php

namespace App\Commands;

use App\Services\VotesRetrievalService;
use App\Services\VotesStorageService;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

use function Termwind\render;

class CollectCommand extends Command
{
    protected $signature = 'votes:collect';

    protected $description = 'Collect votes';

    public function handle(): void
    {
        $votes = app(VotesRetrievalService::class)->retrieveVotes();
        app(VotesStorageService::class)->storeVotes($votes);
    }

    public function schedule(Schedule $schedule): void
    {
        $schedule->command(static::class)->everyMinute();
    }
}
