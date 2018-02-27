<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use App\Poll;

class PollsController extends Controller
{
    public function index()
    {
        $polls = Poll::all();

        return view('polls.index')->with('polls', $polls);
    }


    public function create()
    {
        return view('polls.create');
    }


    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        Poll::create([
            'title' => request()->title,
            'user_id' => Auth::id(),
            'start_date' => request()->start_date,
            'end_date' => request()->end_date
        ]);
        
        Session::flash('success', 'Poll created successfully');
         return redirect()->back();
    }
}
