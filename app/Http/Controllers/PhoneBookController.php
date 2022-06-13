<?php

namespace App\Http\Controllers;

use App\Models\Phone_Book_Detail;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    function onInsert(Request $request){

        $jwt=$request->input('access_token');
        $key=env('TOKEN_KEY');
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        $decodedArray=(array)$decoded;
        $username=$decodedArray['user'];

        $p_one=$request->input('phone_number_one');
        $p_two=$request->input('phone_number_two');
        $name=$request->input('name');
        $email=$request->input('email');

        $Result= Phone_Book_Detail::insert(['username'=>$username,'phone_number_one'=>$p_one,'phone_number_two'=>$p_two,'name'=>$name,'email'=>$email]);

        if($Result==true){
            return"Insert Success";
        }
        else{
            return"Insert Fail";
        }
    }
    function onSelect(Request $request){
        $jwt=$request->input('access_token');
        $key=env('TOKEN_KEY');
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        $decodedArray=(array)$decoded;
        $username=$decodedArray['user'];

        $Result= Phone_Book_Detail::where('username',$username)->get();
        return $Result;
    }
    function onDelete(Request $request){
        $email=$request->input('email');
        $jwt=$request->input('access_token');
        $key=env('TOKEN_KEY');
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        $decodedArray=(array)$decoded;
        $username=$decodedArray['user'];
        $Result=Phone_Book_Detail::where(['username'=>$username,'email'=>$email])->delete();

        if($Result==true)
        {
            return "Delete Sucess";
        }
        else{
            return "Delete Fail";
        }
    }
    function onUpdate(Request $request){
    }

}
