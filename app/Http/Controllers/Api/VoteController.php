<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\vote; 
use Illuminate\Support\Facades\Auth; 
use Validator;

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

        // Validate the request...
   
//     public function vote(Request $request){ 
//         $validator = Validator::make($request->all(), 
//               [ 
//               'email' => 'required|between:3,64|email|unique:users',
//               'tile' => 'required',  
//              ]);   
//  if ($validator->fails()) {          
//        return response()->json(['error'=>$validator->errors()], 401);                        }    
//  $input = vote::create($request->all());  
//  if ($input){
//       // increment the voted field of the movie table
//     Movie::find($movie_title)->increment('voted');
//     $success['voted'] =  "you voted successfully";
//     return response()->json(['success'=>$success], $this->successStatus); 
//     } else{
//         return response()->json(['error'=>'vote unsuccessful'], 401);
//     }
// }
    


        // return redirect('welcome')->with('status', "you successfully voted $request->movie_id;");
        

    /**
     * Display the specified resource.
     *
     * @param  \App\vote  $vote
     * @return \Illuminate\Http\Response
     */

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
