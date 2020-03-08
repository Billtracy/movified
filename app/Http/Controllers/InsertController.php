<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Appp\Movies;

class InsertController extends Controller {
public function insertform(){
return view('insert');
}
public function insert(Request $request){
$title = $request->input('title');
$short_description = $request->input('short_description');
$image = $request->input('image');
$trailer_url = $request->input('trailer_url');
$showing_date = $request->input('showing_date');
$data=array('title'=>$title,"short_description"=>$short_description,"image"=>$image,"trailer_url"=>$trailer_url, "showing_date"=>$showing_date);
DB::table('movies')->insert($data);
echo "Record inserted successfully.<br/>";
echo '<a href = "/insert">Click Here</a> to go back.';
}
}