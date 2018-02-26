<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Reply;
use App\Topic;
use App\ReplyLike;

use Session;

class RepliesController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
       $topic = Topic::find($id);

       $reply = Reply::create([
        'user_id' => Auth::id(),
        'topic_id' => $topic->id,
        'content' => request()->content
       ]);

        Session::flash('success', 'Reply posted');

        return redirect()->back();
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function like($id)
    {
        $liked = ReplyLike::where('user_id', Auth::id())->where('reply_id', $id)->where('like', 1)->first();
        $unliked = ReplyLike::where('user_id', Auth::id())->where('reply_id', $id)->where('like', 0)->first();

        if($liked){
            Session::flash('info', 'You have liked this Reply');
            return redirect()->back();
        }

        elseif($unliked)
        {
            $unliked->delete();
            ReplyLike::create([
                'user_id' => Auth::id(),
                'reply_id' => $id,
                'like' => 1
            ]);

            Session::flash('success', 'You now liked this Reply');
            return redirect()->back();
        }

        else{
             ReplyLike::create([
                'user_id' => Auth::id(),
                'reply_id' => $id,
                'like' => 1
            ]);

            Session::flash('success', 'You now liked this Reply');
            return redirect()->back();
        }
    }


    public function unlike($id)
    {
        $liked = ReplyLike::where('user_id', Auth::id())->where('reply_id', $id)->where('like', 1)->first();
        $unliked = ReplyLike::where('user_id', Auth::id())->where('reply_id', $id)->where('like', 0)->first();

        if($liked){
            $liked->delete();

            ReplyLike::create([
                'user_id' => Auth::id(),
                'reply_id' => $id,
                'like' => 0
            ]);
            Session::flash('success', 'You now unliked this Reply');
            return redirect()->back();
        }
        elseif($unliked){
            Session::flash('success', 'You have not liked this Reply');
            return redirect()->back();
        }
        else{
            ReplyLike::create([
                'user_id' => Auth::id(),
                'reply_id' => $id,
                'like' => 0
            ]);
            Session::flash('success', 'You now unliked this Reply');
            return redirect()->back();
        }        
        
    }

     
}
