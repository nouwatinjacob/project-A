<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicLike extends Model
{
    protected $fillable = [
        'user_id', 'topic_id', 'like'
    ];

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
