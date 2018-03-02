<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;
use App\Category;
use App\Reply;
use App\TopicLike;
use App\ReplyLike;
use App\Poll;
use Auth;
use Session;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $activePolls = Poll::where('active', 1)->get();

        return view('forum')->with('topics', Topic::orderBy('created_at', 'desc')->paginate(3))
                                   ->with('categories', $categories)
                                   ->with('polls', $activePolls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        $topic = Topic::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description            
        ]);

        Session::flash('success', 'You started new Topic');

        return redirect()->route('topics.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $topic = Topic::find($id);
       $categories = Category::all();
       $replies = Reply::where('topic_id', $id)->get();

       $topic_likes = $topic->topicLikes()->where('like', 1)->count();
       $topic_unlikes = $topic->topicLikes()->where('like', 0)->count();

       if($topic)
       {
           $topic->view += 1;
           $topic->save();
       }       

       return view('topics.show')->with('topic', $topic)
                                 ->with('categories', $categories)
                                 ->with('replies', $replies)
                                 ->with('topic_likes', $topic_likes)
                                 ->with('topic_unlikes', $topic_unlikes);
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

    public function topicsWithCatId($id)
    {
        $topics = Topic::where('category_id', $id)->paginate(5);

        $category = Category::find($id);

        if($topics->count() > 0)
        {
            return view('topics.categoryTopic')->with('topics', $topics)
                                           ->with('categories', Category::all())
                                           ->with('category', $category);
        }
        else{
            Session::flash('info', 'This category has no Topics');
            return redirect()->back();
        }
        
    }

    public function like($id)
    {   
        $liked = TopicLike::where('user_id', Auth::id())->where('topic_id', $id)->where('like', 1)->first();
        $unliked = TopicLike::where('user_id', Auth::id())->where('topic_id', $id)->where('like', 0)->first();

        if($liked){
            Session::flash('info', 'You have liked this Topic');
            return redirect()->back();
        }

        elseif($unliked)
        {
            $unliked->delete();
            TopicLike::create([
                'user_id' => Auth::id(),
                'topic_id' => $id,
                'like' => 1
            ]);

            Session::flash('success', 'You now liked this Topic');
            return redirect()->back();
        }

        else{
             TopicLike::create([
                'user_id' => Auth::id(),
                'topic_id' => $id,
                'like' => 1
            ]);

            Session::flash('success', 'You now liked this Topic');
            return redirect()->back();
        }
        
    }

    public function unlike($id)
    {
        $liked = TopicLike::where('user_id', Auth::id())->where('topic_id', $id)->where('like', 1)->first();
        $unliked = TopicLike::where('user_id', Auth::id())->where('topic_id', $id)->where('like', 0)->first();

        if($liked){
            $liked->delete();

            TopicLike::create([
                'user_id' => Auth::id(),
                'topic_id' => $id,
                'like' => 0
            ]);
            Session::flash('success', 'You now unliked this Topic');
            return redirect()->back();
        }
        elseif($unliked){
            Session::flash('success', 'You have not liked this Topic');
            return redirect()->back();
        }
        else{
            TopicLike::create([
                'user_id' => Auth::id(),
                'topic_id' => $id,
                'like' => 0
            ]);
            Session::flash('success', 'You now unliked this Topic');
            return redirect()->back();
        }        
        
    }
    
}
