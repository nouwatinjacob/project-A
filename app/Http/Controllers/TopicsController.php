<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;
use App\Category;
use App\Reply;
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

        return view('forum')->with('topics', Topic::orderBy('created_at', 'desc')->paginate(3))
                                   ->with('categories', $categories);
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

       return view('topics.show')->with('topic', $topic)
                                 ->with('categories', $categories)
                                 ->with('replies', $replies);
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
    
}
