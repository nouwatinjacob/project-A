<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyLike extends Model
{
    protected $fillable = [
        'user_id', 'reply_id', 'like'
    ];

    public function reply()
    {
        return $this->belongsTo('App\Reply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
