<?php

namespace App\Http\Controllers;
use App\vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public $successStatus = 200;


    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validate the request...

        $vote = new \App\Vote;

        $vote->user_id = $request->user_id;
        $vote->movie_id = $request->movie_id;
        $vote->user_api_token = $request->user_api_token;
        $vote->votes = $request->votes;


        $vote->save();

        return redirect('/')->with('status', "you successfully voted $request->movie_id;");

    }

    public function show(vote $vote)
    {
        return view('vote');
    }

    public function edit(vote $vote)
    {
        //
    }

    public function update(Request $request, vote $vote)
    {
        //
    }

    public function destroy(vote $vote)
    {
        //
    }
}
