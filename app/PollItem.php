<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollItem extends Model
{
    protected $fillable = [
        'name', 'poll_id'
    ];

    public function poll()
    {
        return $this->belongsTo('App\Poll');
    }

    public function pollItemVotes()
    {
        return $this->hasMany('App\PollItemVote');
    }
}
