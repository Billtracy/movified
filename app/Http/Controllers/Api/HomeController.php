<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Movie;
use App\vote;
use App\Votable;
use Illuminate\Support\Facades\Auth; 
use Validator;


class HomeController extends Controller
{
    public $successStatus = 200;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $movies = Movie::all();
            $data = ['movies' => $movies];
            return response()->json(['data' => $data,], $this->successStatus);
    }



public function vote (Request $request) {  
    // validate the inputs  
    $validator = Validator::make($request->all(), 
                 [
                    'movie_title' => 'required',
                ]);   
    if ($validator->fails()) {          
          return response()->json(['error'=>$validator->errors()], 401);
} else{
    // check if people can vote
    $votable = Votable::find(1);
    if ($votable->check_votes == 0){
        return response()->json(['error'=> "you can't vote now"], 401);
    }else{
    // $movie_id=  Movie::where ('id', '=', $request->input('movie_title'))->exists();
    $vote = new vote();
    $vote->email = Auth::user()->email;
    $vote->movie_title = $request->input('movie_title');
    if (Movie::where ('id', '=', $vote->movie_title)->exists()){
    // check if the person has voted before
    if (vote::where('email', '=', $vote->email)->exists()) {
        return response()->json(['error'=> 'you already voted'], 401);
     }else{
    $vote->save();
       // increment the voted field of the movie table
    Movie::find($vote->movie_title)->increment('voted');
    $success['voted'] =  ('you voted successfully');
    return response()->json(['success'=>$success], $this->successStatus); 
   }
}else{
    return response()->json(['error'=> 'movie does not exist']);
}
}
}
}
}