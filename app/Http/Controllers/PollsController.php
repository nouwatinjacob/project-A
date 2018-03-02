<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use App\Poll;
use App\PollItem;
use App\PollItemVote;

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
         return redirect()->route('polls.index');
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


    public function vote()
    {         
        if(request()->itemsOptions == '')
        {
            Session::flash('info', 'You must pick an item before voting');
            return redirect()->back();
        }

        $item = PollItem::find(request()->itemsOptions);
        $auth_voted_poll = PollItemVote::where('poll_id', $item->poll_id)->first();
        
        if(request()->itemsOptions == $auth_voted_poll->poll_item_id && $auth_voted_poll->user_id == Auth::id())
        {
            Session::flash('info', 'You have picked this item! , pick another item for your vote to count');
            return redirect()->back();
        }

        if(request()->itemsOptions !== $auth_voted_poll->poll_item_id && $auth_voted_poll->user_id == Auth::id())
        {
            $auth_voted_poll->poll_item_id = intval(request()->itemsOptions);
            $auth_voted_poll->save();
            Session::flash('success', 'Your new pick has been updated');
            return redirect()->back();
        }
                       
        else{
            $item->pollItemVotes()->create([
                'user_id' => Auth::id(),
                'poll_id' => $item->poll->id,
                'poll_item_id' => intval(request()->itemsOptions)
            ]);

            Session::flash('success', 'You have voted');
            return redirect()->back();
                        
        }        
                        
    } 

}
