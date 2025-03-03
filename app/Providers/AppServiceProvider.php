<?php

namespace App\Providers;

use App\Services\VotesStorageService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(VotesRetrievalService::class, function () {
            return new VotesRetrievalService();
        });

        $this->app->singleton(VotesStorageService::class, function () {
            return new VotesStorageService();
        });
    }
}
