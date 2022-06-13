<?php

namespace App\Http\Controllers;
use App\Models\Registration;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class LoginController extends Controller
{
    function tokentest(){
        return "token is okay";
    }
    function onLongin(Request $request){

        $username=$request->input('username');
        $password=$request->input('password');
        $userCount=Registration::where(['username'=>$username,'password'=>$password])->count();

        if($userCount==1){
            $key=env('TOKEN_KEY');
            $payload = [
                'iss' => 'http://demo.org',
                'user' => $username,
                'iat' => time(),              //time suru hobe
                'exp' => time()+3600         //token e kotokhon thakbe token duration
            ];
            $jwt=JWT::encode($payload, $key, 'HS256');
            return response()->json(['Token'=>$jwt,'Status'=>'Login Success']);
        }
        else{
            return "login Fail";
        }
    }
}
