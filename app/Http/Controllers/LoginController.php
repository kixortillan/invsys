<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {
    	$client = new Client([
    		'base_uri' => env('APP_URL'),
    		'timeout' => '10.0'
		]);

    	$response = $client->post('/oauth/token', [
			    		'form_params' => [
			    			'grant_type' => 'password',
			    			'username' => $request->get('username'),
			    			'password' => $request->get('password'),
			    			'client_id' => env('CLIENT_ID'),
			    			'client_secret' => env('CLIENT_SECRET'),
			    			'scope' => ''
						]
					]);

    	if($response->getStatusCode() == Response::HTTP_OK){
			$oauth = json_decode($response->getBody());

			return response()->json($oauth);
    	}else{
    		return abort(401);
    	}
    }
}
