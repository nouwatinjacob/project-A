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

class ForumsController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $activePolls = Poll::where('active', 1)->get();
        return view('index')->with('topics', Topic::orderBy('created_at', 'desc')->paginate(7))
                            ->with('categories', $categories)
                            ->with('polls', $activePolls);
    }

    public function show($id) 
    {
       $topic = Topic::find($id);
       $categories = Category::all();
       $replies = Reply::where('topic_id', $id)->get();
       $activePolls = Poll::where('active', 1)->get();

       $topic_likes = $topic->topicLikes()->where('like', 1)->count();
       $topic_unlikes = $topic->topicLikes()->where('like', 0)->count();

       if($topic)
       {
           $topic->view += 1;
           $topic->save();
       }       

       return view('template.show-topic')->with('topic', $topic)
                                 ->with('categories', $categories)
                                 ->with('replies', $replies)
                                 ->with('topic_likes', $topic_likes)
                                 ->with('topic_unlikes', $topic_unlikes)
                                 ->with('polls', $activePolls);
    }

    public function create()
    {
        $activePolls = Poll::where('active', 1)->get();
        return view('template.create-topic')->with('categories', Category::all())
                                            ->with('polls', $activePolls);
    }


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

        return redirect()->back();
    }


    public function getTopicsWithCategory($id)
    {
        $topics = Topic::where('category_id', $id)->paginate(5);

        $category = Category::find($id);
        $activePolls = Poll::where('active', 1)->get();

        if($topics->count() > 0)
        {
            return view('template.categoryTopic')->with('topics', $topics)
                                           ->with('categories', Category::all())
                                           ->with('category', $category)
                                           ->with('polls', $activePolls);
        }
        else{
            Session::flash('info', 'This category has no Topics');
            return redirect()->back();
        }
    } 
}
