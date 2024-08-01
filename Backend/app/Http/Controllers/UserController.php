<?php

namespace App\Http\Controllers;

use App\Models\Shipping_Address;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function signup(Request $request)
    {
        $user = new User;
        $user ->firstname = $request->input("firstname");
        $user ->lastname = $request->input("lastname");
        $user ->email = $request->input("email");
        $user ->password =Hash::make( $request->input("password"));
        $user = User::where("email", $request->email)->first();
        if( !$user ) {
        $user->save();
        return $user;
        } else {
            return response(["error"=>"this user is already created"]);
        }
    }

    function login(Request $request){
       $user = User::where("email", $request->email)->first();
       if(!$user || !Hash::check($request->password, $user->password)) {
        return response(["error"=>["NotMatch"]]);
       }
       return $user;
    }

    
}
