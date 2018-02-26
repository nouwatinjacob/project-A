<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Topic;

class Reply extends Model
{
    protected $fillable = [
        'topic_id', 'content', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function replyLikes()
    {
        return $this->hasMany('App\ReplyLike');
    }
    
    
}
