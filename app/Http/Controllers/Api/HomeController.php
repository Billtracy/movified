<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\vote; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Response;


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
            $posts = \App\Movie::all();
            $date = \App\ShowingDate::all();
            return response()->json( $date, ['success' => $posts], $this->successStatus);
            // Response::json(array('movies'=>$posts,'date'=>$date));
            // $date = \App\ShowingDate::all();
            // return view('dashboard', ['post' => $posts]);
    }

    public function vote(Request $request){ 
        $validator = Validator::make($request->all(), 
              [ 
              'user_email' => 'required|between:3,64|email|unique:users',
              'movie_tile' => 'required',  
             ]);   
 if ($validator->fails()) {          
       return response()->json(['error'=>$validator->errors()], 401);                        }    
$vote = new \App\Vote; 
$vote->user_email = $request->user_email;
$vote->movie_title = $request->movie_title;
$input= $vote->save();
if ($input){
      // increment the voted field of the movie table
    Movie::find($movie_title)->increment('voted');
    $success['voted'] =  "you voted successfully";
    return response()->json(['success'=>$success], $this->successStatus); 
    } else{
        return response()->json(['error'=>'vote unsuccessful'], 401);
    }
}
}