<?php

namespace App\Services;

use App\Transports\VotesTransport;
use Illuminate\Support\Facades\Http;

class VotesRetrievalService
{
    /**
     * Retrieve votes from the website.
     *
     * @return VotesTransport
     */
    public function retrieveVotes(): VotesTransport
    {
        $competition = Http::get(config('votes.url'))->json();

        $round = $competition['current_round'];

        $votes = [];
        foreach ($round['results'] as $result) {
            $votes[$result['participant']['title']] = $result['votes'];
        }

        return new VotesTransport($round['round']['id'], $votes);
    }
}