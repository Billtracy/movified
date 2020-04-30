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
                        'movie_id' => 'required',
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
                $movie = Movie::findOrFail($request->input('movie_id'));

                return $movie;
                // if(empty($movie)){
                //     return "movie does not exist";
                // }

            }
        }
    }
}

            //if movie exists
                //save voting

            //else
                // return movie does not exist

    






// $votable = Votable::find(1);  
// if ($votable->check_votes == 0){
//     return response()->json(['error'=> "you can't vote now"], 401);
// }
// else{
// $movie = Movie::find($request->input('movie_id'));
// $vote = new vote();
// $vote->email = Auth::user()->email;
// $vote->movie_id = $request->input('movie_id');
// $vote->movie_title = $movie->title ?? null;
// if (Movie::where ('id', '=', $vote->movie_id)->exists()){
// if (vote::where('email', '=', $vote->email)->exists()) {
//     return response()->json(['error'=> 'you already voted'], 401);
//  }else{
// $vote->save();
// Movie::find($vote->movie_id)->increment('voted');
// $success['voted'] =  'you voted successfully';
// return response()->json(['success'=>$success], $this->successStatus); 
// }
// }else{
// return response()->json(['error'=> 'movie does not exist']);
// }
// }
// }
// }