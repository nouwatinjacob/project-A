<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use App\Poll;
use App\PollItem;

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
            
        $poll = Poll::create([
            'title' => request()->title,
            'user_id' => Auth::id(),
            'start_date' => request()->start_date,
            'end_date' => request()->end_date
        ]);
        
        // for($i=0; $i<count(request()->addmore); $i++) {
        //     $poll->pollItems()->create([
        //         'name' => request()->addmore[$i]
        //     ]);
        // }    
                        
        Session::flash('success', 'Poll created successfully');
         return redirect()->back();
    }


    public function edit($id)
    {
        return view('polls.edit')->with('poll', Poll::find($id));
    }


    public function items($id)
    {
        $poll = Poll::find($id);

        return view('polls.items')->with('poll', $poll);
    }


    public function createItems($id)
    {
        return view('polls.create_item')->with('poll', Poll::find($id));
    }


    public function storeItem($id)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        PollItem::create([
            'name' => request()->name,
            'poll_id' => $id
        ]);

        Session::flash('success', 'Item added successfully');
        return redirect()->route('items', ['id' => $id]);
    }


    public function editItem($id)
    {
        return view('polls.edit_item')->with('item', PollItem::find($id));
    }


    public function updateItem($id)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);
            
        $item = PollItem::find($id);
        $item->name = request()->name;
        $item->save();
        Session::flash('success', 'Item updated successfully');
        return redirect()->route('items', ['id' => $item->poll_id]);
    }


    public function deleteItem($id)
    {
        PollItem::destroy($id);

        Session::flash('success', 'Item deleted successfully');
        return redirect()->back();
    }

}
