<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\school;

class schoolController extends Controller
{
    public function school(){
        $school = school::find(1);
        return view("addSchool", compact('school'));
    }

    public function schoolUpdate(Request $req){

        $permission = array("jpg","png");

        $file = $req->logu;
        $extension = $file->getClientOriginalExtension();
        $path = "img/".substr(md5(time()), 0,10).".".$extension;
        $school = school::find(1);

        if ($school) {

            if (!in_array($extension, $permission)) {
                echo "img_error";
            }else{
                $school = school::find(1);
                $school->name = $req->name;
                $school->email = $req->email;
                $school->phone = $req->phone;
                $school->address = $req->address;
                $school->establish_name = $req->establish_name;
                $school->establish_date = $req->establish_date;
                @unlink($school->logu);
                $school->logu = $path;
                $school->save();
                move_uploaded_file($file, $path);
                return "2";
            }

        }else{

            if (!in_array($extension, $permission)) {
                echo "img_error";
            }else{
                $school = new school();
                $school->name = $req->name;
                $school->email = $req->email;
                $school->phone = $req->phone;
                $school->address = $req->address;
                $school->establish_name = $req->establish_name;
                $school->establish_date = $req->establish_date;
                $school->logu = $path;
                $school->save();
                move_uploaded_file($file, $path);
                return "1";
            }
        }

        

    }
}
