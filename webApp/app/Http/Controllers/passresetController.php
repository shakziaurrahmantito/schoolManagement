<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\passreset;
use App\Mail\forgotEmail;
use Mail;

class passresetController extends Controller
{
    public function reset(){
        return view("reset");
    }

    public function resetPassword(Request $req){

        $tea_count = teacher::where("tea_email",$req->email)->count();
        $tea = teacher::where("tea_email",$req->email)->first();

        if ($tea_count > 0) {

            $pass = passreset::where("email",$req->email)->count();

            if ($pass > 0) {
                $pass = passreset::where("email",$req->email)->first();
                $pass->email = $req->email;
                $pass->code = md5(time());
                $pass->save();
                $data = [
                    "name" => $tea->tea_name,
                    "link" => url("/passreset?token=".md5(time())."&identify=".base64_encode($req->email))
                ];
                Mail::to($req->email)->send(new forgotEmail($data));
            }else{
                $pass = new passreset();
                $pass->email = $req->email;
                $pass->code = md5(time());
                $pass->save();
                $data = [
                    "name" => $tea->tea_name,
                    "link" => url("/passreset?token=".md5(time())."&identify=".base64_encode($req->email))
                ];
                Mail::to($req->email)->send(new forgotEmail($data));
            }

            return response()->json([
                "message" => $req->email
            ]);

        }else{
            return response()->json([
                "message" => 0
            ]);
        }

        return $req->email;
    }


    public function passreset(Request $req){

        $email  = base64_decode($req->identify);
        $code   = $req->token;

        $codeCount = passreset::where("code",$code)->count();

         if ($codeCount > 0) {
             return view("passreset",compact("email"));
         }else{
            return redirect("/");
         }

        
    }


    public function resetpasswordInsert(Request $req){


        $codeCount = teacher::where("tea_email",$req->email)->count();

         if ($codeCount > 0) {

            $tea = teacher::where("tea_email",$req->email)->first();
            $tea->tea_password = md5($req->password);
            $tea->save();

            passreset::where("email",$req->email)->delete();
            
            return response()->json([
                "message" => 1
            ]);

         }else{
            return redirect("/");
         }

        
    }


}

