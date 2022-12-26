<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loginInfo;
use App\Models\school;
use Laravel\Socialite\Facades\Socialite;

class loginController extends Controller
{

    public function loglist(){
         $school = school::find(1);
         $loginfo = loginInfo::orderby("id","DESC")->get();
        return view("loginlist", compact('loginfo','school'));
    }


    public function googleRedirect(){
         return Socialite::driver('google')->redirect();
    }

    public function googleCallback(){
          $user = Socialite::driver('google')->user();
          return $user;
    }



    
}
