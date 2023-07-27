<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function register_user(Request $req){
        $username = $req -> name;
        $email = $req -> email;
        $password = $req -> password;

        $new_data = new User([
            'name' => $username,
            'email' => $email,
            'password' => $password
        ]);

        $new_data -> save();

        return response() -> json(['data' => $new_data], 200);
    }

    public function get_users(){
        $users = User::all();
        
        return response() -> json(['data' => $users], 200);
    }

}
