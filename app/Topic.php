<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\TopicLike;

class Topic extends Model
{
    protected $fillable = [
        'title', 'category_id', 'description', 'user_id' 
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function topicLikes()
    {
        return $this->hasMany('App\TopicLike');
    }

    public function check_if_topic_is_liked_by_auth()
    {
        $liked = TopicLike::where('user-id', Auth::id())->where('like', 1);
        $unliked = TopicLike::where('user-id', Auth::id())->where('like', 0);

        if($liked) {
            return true;
        }
        elseif ($unlike) {
            return false;
        }
        
    }
}
