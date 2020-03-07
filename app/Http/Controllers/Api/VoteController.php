<?php

namespace App\Http\Controllers\Api;
use App\vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public $successStatus = 200;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...

        $vote = new \App\Vote;

        $vote->user_id = $request->user_id;
        $vote->movie_id = $request->movie_id;
        $vote->user_api_token = $request->user_api_token;
        $vote->votes = $request->votes;


        $vote->save();

        return response()->json(['success'=>$vote], $this->successStatus); 

        // return redirect('welcome')->with('status', "you successfully voted $request->movie_id;");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(vote $vote)
    {
        return view('vote');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(vote $vote)
    {
        //
    }
}
