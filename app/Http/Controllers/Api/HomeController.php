<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\vote; 
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $movies = \App\Movie::all();
            // $date = \App\ShowingDate::where('next_movie_night', 1)->firstOrFail();
            $data = ['movies' => $movies];
            return response()->json(['response' => 'success', 'data' => $data,], $this->successStatus);

            // $date = \App\ShowingDate::all();
            // return response()->json(['success' => $date], $this->successStatus);
            // return view('dashboard', ['post' => $posts]);
    }

    public function vote(Request $request){ 
        vote::create(Request()->validate([
            'user_email' => 'required|between:3,64|email|unique:users',
            'movie_tile' => 'required',  
])); 
      // increment the voted field of the movie table
    \App\Movie::find($movie_title)->increment('voted');
    $success['voted'] =  "you voted successfully";
    return response()->json(['success'=>$success], $this->successStatus); 
    } 
}
