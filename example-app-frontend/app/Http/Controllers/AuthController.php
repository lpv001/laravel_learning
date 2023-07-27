<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class AuthController extends Controller
{

    public static function login(Request $req){

        $email = $req -> email;
        $password = $req -> password;

        $http = new \GuzzleHttp\Client();
        $body = [
            'myemail' => $email,
            'mypassword' => $password
        ];

        $response = $http->post('http://localhost:8000/api/auth/login', ['form_params' => $body]); 
        $status_code = $response->getStatusCode();

        if ($status_code == 200){
            return back() -> with('failure', 'Login failure');
        }
        // -> cookie('accessToken', $token)
        $result = json_decode((string)$response -> getBody(), true); 
        $access_token = $result['user']['access_token'];

        return redirect('/') -> cookie('accessToken', $access_token);

    }
    

}
