<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public static function register_user(Request $req){
        
        $user = new User([
            'name' => $req -> myname,
            'email' => $req -> myemail,
            'gender' => $req -> mygender,
            'image' => $req -> myimage,
            'password' => $req -> mypassword
        ]);

        $user -> save();
        return response() -> json(['user' => $user]);

    }

    public static function login_user(Request $req){
        
        $email = $req -> myemail;
        $user = User::where('email', $email) -> first();

        if (!$user){
            return response() -> json(['user' => 'user does not exist'], 200);
        }

        if (!Hash::check($req -> mypassword, $user -> password)){
            return response() -> json(['user' => 'user password is incorrect'], 200);
        }

        $token = $user -> createToken('Personal Access Token') -> plainTextToken;

        return response() -> json(['user' => [
            'user' => $user,
            'access_token' => $token
        ]], 201);

    }

    public static function update_user(Request $req){

        $id = $req -> id;
        $new_name = $req -> new_name;
        $new_password = $req -> new_password;

        $update_query = User::where('id', $id)
        ->update([
           'name' => $new_name,
           'password' => $new_password
        ]);

        if (!$update_query){
            return response() -> json(['user' => [
                'message' => 'user not found'
            ]]);
        }

        return response() -> json(['user' => [
            'message' => 'update_successful'
        ]]);

    }

    public static function delete_user(Request $req){
        $id = $req -> id;

        if ($id == null){
            return response() -> json(['user' => [
                'message' => 'no id',
            ]]);
        }

        $delete_query = User::where('id', $id) -> delete();
        if (!$delete_query){
            return response() -> json(['user' => [
                'message' => 'user not found',
            ]]);
        }
        return response() -> json(['user' => [
            'message' => 'delete successful',
        ]]);
    }


    public static function get_users(){
        $users = User::all();
        return response() -> json(['users' => [
            'users' => $users
        ]]);
    }

    public static function get_me(){

        $user = auth('sanctum') -> user();

        if (!$user){
            return response() -> json(['user_status' => 'Unauthorized'], 401);
        }

        return response() -> json(['users' => [
            'users' => $user
        ]], 200);

    }
    
}
