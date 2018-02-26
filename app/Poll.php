<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = [
        'title', 'user_id', 'start_date', 'end_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pollItems()
    {
        return $this->hasMany('App\PollItem');
    }

    public function pollItemVotes()
    {
        return $this->hasMany('App\PollItemVote');
    }
}
