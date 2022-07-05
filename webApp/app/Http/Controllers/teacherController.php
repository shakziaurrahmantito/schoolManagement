<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\role;
use App\Models\classes;
use App\Models\school;
use App\Models\student;
use App\Models\attendance;
use App\Models\loginInfo;
use Illuminate\Support\Facades\Session;
use App\Mail\teacherAccountMail;
use Illuminate\Support\Facades\Mail;
use PDF;
use BrowserDetect;

class teacherController extends Controller
{


    public function dasboard(){

        date_default_timezone_set("Asia/Dhaka");

        $currentTotalStudent = student::join("classes","students.st_class","=", "classes.cla_id")
        ->select("students.*","classes.cla_name")
        ->orderby("students.st_id","ASC")
        ->where("students.st_class", Session::get("tea_cla"))
        ->count();


        $todayPresent = attendance::where("class_id", Session::get("tea_cla"))
        ->where("attendance_date", date("d-M-Y"))
        ->where("attendance", "P")
        ->count();


        $todayAbsent = attendance::where("class_id", Session::get("tea_cla"))
        ->where("attendance_date", date("d-M-Y"))
        ->where("attendance", "A")
        ->count();

        $totalClass = classes::count();

        $totalStudent = student::count();
        $totalTeacher = teacher::count();

        $disabledStudent = student::where("st_status","0")
        ->where("st_class", Session::get("tea_cla"))
        ->count();

        $countinueStudent = student::where("st_status","1")
        ->where("st_class", Session::get("tea_cla"))
        ->count();

        $attendanceStatus = attendance::where("class_id", Session::get("tea_cla"))
        ->where("attendance_date", date("d-M-Y"))
        ->count();

        $selected_class = classes::find(Session::get("tea_cla"));

        return view('dashboad', compact("currentTotalStudent","todayPresent","todayAbsent","totalClass","totalStudent","disabledStudent","countinueStudent","attendanceStatus","selected_class","totalTeacher"));
    }


    public function login(){
        return view('login');
    }


    public function logOut(){
        session::forget("login");
        session::forget("tea_id");
        session::forget("tea_cla");
        return redirect("/login");
    }

    public function teaDownload($id){

        $tea = teacher::find($id);
        $school = school::find(1);
        $pdf = PDF::loadView("pdf.teacherpdf", compact('tea','school'));
        return $pdf->download($tea->tea_name.".pdf");

    }

    public function teacherLogin(Request $req){

        $count = teacher::where("tea_email",$req->tea_email)
                ->where("tea_password",md5($req->tea_password))
                ->limit(1)
                ->count();
        $result = teacher::where("tea_email",$req->tea_email)
                ->where("tea_password",md5($req->tea_password))
                ->first();
        if ($count > 0) {
            $req->session()->put("login",1);
            $req->session()->put("tea_id", $result->tea_id);
            $req->session()->put("tea_cla", $result->tea_cla);

            $broserName = BrowserDetect::browserFamily();
            $ip = $_SERVER['REMOTE_ADDR'];

            $log = new loginInfo();
            $log->name = $result->tea_name;
            $log->email = $result->tea_email;
            $log->user_ip = $ip;
            $log->browser = $broserName;
            $log->save();
            return "1";
        }else{
            return "0";
        }

    }

    public function teacherAdd(){
        $getCla = classes::orderby("cla_id","ASC")->where("cla_status","1")->get();
        $getRole = role::orderby("role_id","ASC")->where("role_status","1")->get();
        return view('addTeacher', compact('getCla','getRole'));
    }





    public function teacherInsert(Request $req){
       $req->validate([
            "tea_name" => "required",
            "tea_father" => "required",
            "tea_mother" => "required",
            "tea_email" => "required|email|unique:teachers",
            "tea_phone" => "required",
            "tea_nid" => "required|min:11",
            "tea_address" => "required",
            "tea_password" => "required|min:6",
            "tea_con_password" => "required|min:6|required_with:tea_password|same:tea_password|min:6",
            "tea_role" => "required",
            "tea_cla" => "required",
            "tea_img" => "required|mimes:jpg,png",
            "tea_status" => "required"
       ]);

        $file = $req->tea_img;
        $fileName = strtolower(substr(md5(time()),0,10).".".$file->getClientOriginalExtension());
        $path = "img/".$fileName;
        
       $teacher = new teacher();
       $teacher->tea_name = $req->tea_name;
       $teacher->tea_father = $req->tea_father;
       $teacher->tea_mother = $req->tea_mother;
       $teacher->tea_email = $req->tea_email;
       $teacher->tea_phone = $req->tea_phone;
       $teacher->tea_nid = $req->tea_nid;
       $teacher->tea_address = $req->tea_address;
       $teacher->tea_password = md5($req->tea_password);
       $teacher->tea_role = $req->tea_role;
       $teacher->tea_cla = $req->tea_cla;
       $teacher->tea_img = $path;
       $teacher->tea_status = $req->tea_status;
       $teacher->save();

       move_uploaded_file($file, $path);

       $data = [
            "name" => $req->tea_name,
            "email" => $req->tea_email,
            "password" => $req->tea_password
       ];


       $senderInfo = [
            "from" => "contact@shakziaurrahmantito.tk",
            "alias" => "New account",
            "subject" => "New account login infomation"
       ];

       //$siteLink = url('');

       Mail::to($req->tea_email)->send(new teacherAccountMail($data, $senderInfo));

        
        return redirect()->back()->with("success","Data insert successfully.");

    }




    public function teacherlist(){


       //$getTea = teacher::orderby("tea_id","DESC")->where("tea_status","1")->get();

        $school = school::find(1);
        $getTea = teacher::orderby("tea_id","DESC")->where("tea_status","1")->get();

        return view('teacherlist', compact('getTea','school'));
    }




}
