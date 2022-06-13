<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    function onRegister(Request $request){
        $fname=$request->input('first_name');
        $lname=$request->input('last_name');
        $city=$request->input('city');
        $username=$request->input('username');
        $password=$request->input('password');
        $gender=$request->input('gender');

        $userCount=Registration::where('username',$username)->count();
        if($userCount!=0){
            return"User Already Exist";
        }
        else{
           $Result= Registration::insert(['first_name'=>$fname,'last_name'=>$lname,'city'=>$city,'username'=>$username,'password'=>$password,'gender'=>$gender]);
           if($Result==true)
           {
            return "Registration Success";
           }
           else{
            return"Registration Fail";
           }
        }


    }
}
