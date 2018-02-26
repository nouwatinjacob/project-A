<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollItemVote extends Model
{
    protected $fillable = [
        'poll_item_id', 'user_id', 'poll_id'
    ];

    public function poll()
    {
        return $this->belongsTo('App\Poll');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
