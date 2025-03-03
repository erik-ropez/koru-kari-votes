<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['round_id', 'participant_id', 'votes'];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
