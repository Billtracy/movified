<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;

class HomeController extends Controller
{
    public $successStatus = 200;
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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

    public function authenticate()
    {
        $woocommerce = new Client(
        'http://aliellaonline.com',
        'ck_66a9aac05a373647875137dbe22c4b3a40ad038d',
        'cs_e3a2215915149c2672adc58ec6599fef7be80908',
            [
            'wp_api' => true,
            'version' => 'wc/v3',
            'query_string_auth' => true // Force Basic Authentication as query string true and using under HTTPS
            ]
        );

        $orders = $woocommerce->get('orders');
        return response()->json($orders);
    }

}
