<?php

namespace App\Http\Controllers;

use App\Models\Shipping_Address;
use App\Models\User;
use Illuminate\Http\Request;


class AddressController extends Controller
{
    //
    function address(Request $request){
        $address = new Shipping_Address;
        $address->name= $request->input("name");
        $address->phone=$request->input("phone");
        $address->country=$request->input("country");
        $address->address=$request->input("address");
        $address->city=$request->input("city");
        $address->state=$request->input("state");
        $address->pin=$request->input("pin");
        $address->user_id=$request->input("user_id");
        $address->save();
        return $address;
    }

    function adr(Request $request){
        $adr = Shipping_Address::where("user_id", $request->user_id)->get();
        if(!$adr) {
        return response(["error"=>["NotMatch"]]);
       }
        return $adr;
    }
}
