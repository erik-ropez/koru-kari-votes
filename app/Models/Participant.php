<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['name'];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
