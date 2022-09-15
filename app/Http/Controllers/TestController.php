<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function __construct()
    {
        $this->redis = Redis::connection();
    }
    public function set()
    {
        $this->redis->set('user_details', json_encode([
                'first_name' => 'Alex', 
                'last_name' => 'Malakasssssss',
                'id' => '123'
            ])
        );
    }

    public function get()
    {
        $response = $this->redis->get('user_details');

        $response = json_decode($response);

        return response()->json([
            'data' => $response
        ]);
    }
}
