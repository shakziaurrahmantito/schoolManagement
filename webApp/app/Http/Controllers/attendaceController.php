<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\attendance;
use App\Models\student;
use App\Models\classes;
use App\Models\school;
use Illuminate\Support\Facades\Session;
use App\Mail\attendanceNotify;
use Mail;

class attendaceController extends Controller
{
    public function attenView(){

        $getSt = student::join("classes","students.st_class","=", "classes.cla_id")
        ->select("students.*","classes.cla_name")
        ->orderby("students.st_id","ASC")
        ->where("students.st_class", Session::get("tea_cla"))
        ->get();

        
        return view("attendanceAdd", compact("getSt"));
    }


    public function attendanceInsert(Request $req){


    date_default_timezone_set("Asia/Dhaka");
    $getExists = attendance::where("class_id", Session::get('tea_cla'))->where("attendance_date", date("d-M-Y"))->count();
        if ($getExists) {
            return "0";
        }else{
            $i = 0;

    foreach($req->atten as $roll => $value){

        if ($value == "P") {
           $data = [
                "name" => $req->st_name[$i],
                "attendance" => "present"
            ];
            Mail::to($req->str_email[$i])->send(new attendanceNotify($data));
        }else{
            $data = [
                "name" => $req->st_name[$i],
                "attendance" => "absent"
            ];
            Mail::to($req->str_email[$i])->send(new attendanceNotify($data));
        }

        $att = new attendance();
        $att->st_roll = $roll;
        $att->class_id = Session::get('tea_cla');
        $att->attendance = $value;
        $att->st_id = $req->st_id[$i++];
        $att->attendance_date = date("d-M-Y");
        $att->attendance_month = date("M-Y");
        $att->save();
    }
        }

        return "1";

        
    }


    public function todayAtten(){

        date_default_timezone_set("Asia/Dhaka");

        $getSt = student::join("classes","students.st_class", "classes.cla_id")

        ->join("attendances","students.st_id", "attendances.st_id")
        ->select("students.*","classes.cla_name","attendances.*")

        ->orderby("students.st_id","ASC")
        ->where("students.st_class", Session::get("tea_cla"))
        ->where("attendances.attendance_date", date("d-M-Y"))
        ->get();
        $school = school::find(1);

        return view("todayAtten", compact('getSt','school'));
    

        
    }


    public function daybydayAtten(){
        date_default_timezone_set("Asia/Dhaka");
        $getAttendanceDate = attendance::select("attendance_date")
        ->distinct("attendance_date")
        ->where("class_id", Session::get("tea_cla"))
        ->orderby("attendance_date","DESC")
        ->get();
        $getClassName = classes::where("cla_id", Session::get("tea_cla"))->first();
        $school = school::find(1);
        return view("daybydayAtten", compact('getAttendanceDate','getClassName', 'school'));
    }

    public function daybyday($id){
        date_default_timezone_set("Asia/Dhaka");
        $getSt = student::join("classes","students.st_class", "classes.cla_id")
        ->join("attendances","students.st_id", "attendances.st_id")
        ->select("students.*","classes.cla_name","attendances.*")
        ->orderby("students.st_id","ASC")
        ->where("students.st_class", Session::get("tea_cla"))
        ->where("attendances.attendance_date", $id)
        ->get();
        $getDate = $id;
        $school = school::find(1);
        return view("datewish", compact('getSt','getDate','school'));
    }





    public function monthly_attr($id){



        date_default_timezone_set("Asia/Dhaka");


        $getStudentId = attendance::select("st_id")
        ->distinct("st_id")
        ->where("class_id", Session::get("tea_cla"))
        ->orderby("st_id","ASC")
        ->get();

        $getClassName = classes::where("cla_id", Session::get("tea_cla"))->first();
        

        $getMonth = $id;
        $school = school::find(1);
        return view("monthwishreport", compact('getStudentId','getMonth','getClassName','school'));


    }





    public function month_by_month_attr(){

        date_default_timezone_set("Asia/Dhaka");

        $getAttendanceDate = attendance::select("attendance_month")
        ->distinct("attendance_month")
        ->where("class_id", Session::get("tea_cla"))
        ->orderby("attendance_date","DESC")
        ->get();

        $getClassName = classes::where("cla_id", Session::get("tea_cla"))->first();

        $school = school::find(1);
        return view("monthbymonth", compact('getAttendanceDate','getClassName','school'));

    }



}
