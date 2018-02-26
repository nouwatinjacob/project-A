<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PollsController extends Controller
{
    public function index()
    {
        return view('polls.create');
    }
}
