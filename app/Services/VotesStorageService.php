<?php

namespace App\Services;

use App\Models\Participant;
use App\Transports\VotesTransport;

class VotesStorageService
{
    /**
     * Store votes in the database.
     *
     * @param VotesTransport $transport
     * @return void
     */
    public function storeVotes(VotesTransport $transport): void
    {
        $round = $transport->round();
        foreach ($transport->votes() as $name => $votes) {
            $participant = Participant::firstOrCreate(compact('name'));
            $participant->votes()->create(['round_id' => $round, 'votes' => $votes]);
        }
    }
}
