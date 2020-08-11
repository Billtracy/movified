<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            // return response()->json(['success' => $posts], $this->successStatus);
            return view('dashboard', ['post' => $posts]);
    }

    public function getApiKeys()
    {
        $store_url = 'http://aliellaonline.com';
        $endpoint = '/wc-auth/v1/authorize';
        $params = [
            'app_name' => 'Movified',
            'scope' => 'read_write',
            'user_id' => auth()->user()->id,
            'return_url' => 'https://monixify.herokuapp.com',
            'callback_url' => 'https://monixify.herokuapp.com'
        ];
        $query_string = http_build_query( $params );
        echo $store_url . $endpoint . '?' . $query_string;
    }

}
