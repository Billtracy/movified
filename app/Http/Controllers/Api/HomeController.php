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
                        'movie_id' => 'required|numeric',
                    ]);   
        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);
        }
        else{
            //check whether voting is ongoing
            $votable = Votable::find(1);
            if ($votable->check_votes == 0){
                return response()->json(['error'=> "you can't vote now"], 401);
            }
            else{
                //find movie
                $movie = Movie::find($request->input('movie_id'));
                
                if(empty($movie)){
                    return "movie does not exist";
                }
                $vote = new vote();
                $vote->email = Auth::user()->email;
                $vote->movie_id = $request->input('movie_id');
                $vote->movie_title = $movie->title;
                if (vote::where('email', '=', $vote->email)->exists()){
                    return "you have already voted";
                }
                else{
                    $vote->save();
                    $movie->increment('voted');
                    return "you voted successfully";
                }
            }
        }
    }
}