<?php

namespace App\Transports;

class VotesTransport
{
    public function __construct(
        protected int $round,
        protected array $votes
    ) {
    }

    public function round(): int
    {
        return $this->round;
    }

    public function votes(): array
    {
        return $this->votes;
    }
}
