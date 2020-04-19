<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class AuthController extends Controller 
{
 public $successStatus = 200;
  
 public function register(Request $request) {    
 $validator = Validator::make($request->all(), 
              [ 
              'name' => 'required',
              'email' => 'required|between:3,64|email|unique:users',
              'password' => 'required',  
              'c_password' => 'required|same:password', 
             ]);   
 if ($validator->fails()) {          
       return response()->json(['error'=>$validator->errors()], 401);                        }    
 $input = $request->all();  
 $input['password'] = bcrypt($input['password']);
 $user = User::create($input);
//  $user->sendApiEmailVerificationNotification();

//  $success['message'] = 'Please confirm yourself by clicking on verify button sent to you on your email';
 $success['token'] =  $user->createToken('AppName')-> accessToken;
 return response()->json(['success'=>$success], $this-> successStatus);
}
  
   
public function login(){ 
if(Auth::attempt(['id' => request('id'), 'password' => request('password')])){ 
   $user = Auth::user();
//    if($user->email_verified_at !== NULL){
   $success['token'] =  $user->createToken('AppName')-> accessToken; 
    return response()->json(['success' => $success], $this-> successStatus);
   }
//    else{
//         return response()->json(['error'=>'Please Verify Email'], 401);
//         }
//         }
 else{ 
   return response()->json(['error'=>'Unauthorised'], 401); 
   } 
}

  
public function getUser() {
 $user = Auth::user();
 return response()->json(['success' => $user], $this->successStatus); 
 }
} 