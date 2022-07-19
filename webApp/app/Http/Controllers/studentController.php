<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\classes;
use App\Models\school;
use App\Models\attendance;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PDF;
use App\Mail\studentAdd;

class studentController extends Controller
{


    public function studentAdd(){
        $getCla = classes::orderby("cla_id","DESC")->where("cla_status","1")->get();

        $getStRoll = student::orderby("st_id","DESC")
        ->where("st_class", Session::get('tea_cla'))
        ->where("st_status","1")->count();

        return view('studentAdd', compact('getCla', 'getStRoll'));
    }

    public function studentDelete($id){
        $stu = student::find($id);
        @unlink($stu->st_img);
        attendance::where("st_id", $id)->delete($id);
        student::where("st_id",$id)->delete();
        return redirect('studentList');
    }



    public function studentInsert(Request $req){


        $valid = Validator::make($req->all(),[
                "st_name" => "required",
                "st_father" => "required",
                "st_mother" => "required",
                "st_g_phone" => "required",
                "st_address" => "required",
                "st_email" => "required|email|unique:students",
                "st_roll" => "required",
                "st_dath_of_birth" => "required",
                "birth_reg" => "required",
                "st_ger_img" => "required|mimes:png,jpeg,jpg|max:250",
                "st_img" => "required|mimes:png,jpeg,jpg|max:250",
                "st_status" => "required",
                "st_ger_nid" => "required"
           ]);


        if ($valid->fails()) {
            return response()->json([
                "status"=>0,
                'message'=>$valid->errors()
            ]);
        }


        $getUnique = student::where("st_class", Session::get('tea_cla'))
        ->where("st_roll", $req->st_roll)
        ->where("st_status","1")
        ->count();

        if ($getUnique == 0) {

            $file = $req->st_img;
            $fileName = strtolower(substr(md5(time()),0,10).".".$file->getClientOriginalExtension());
            $path = "img/".$fileName;

            $file_ger = $req->st_ger_img;
            $file_ger_Name = strtolower(substr(md5(time()+1),0,10).".".$file_ger->getClientOriginalExtension());
            $path_ger = "img/".$file_ger_Name;
            
           $st = new student();
           $st->st_name = $req->st_name;
           $st->st_father = $req->st_father;
           $st->st_mother = $req->st_mother;
           $st->st_g_phone = $req->st_g_phone;
           $st->st_address = $req->st_address;
           $st->st_email = $req->st_email;
           $st->st_roll = $req->st_roll;
           $st->st_dath_of_birth = $req->st_dath_of_birth;
           $st->birth_reg = $req->birth_reg;
           $st->st_ger_nid = $req->st_ger_nid;
           $st->st_ger_img = $path_ger;



           $st->st_class = Session::get('tea_cla');
           $st->st_img = $path;
           $st->st_status = $req->st_status;
           $st->save();
            move_uploaded_file($file, $path);
            move_uploaded_file($file_ger, $path_ger);




            return "1";

        }else{

            return response()->json([
                "roll_exists"=>1
            ]);

        }




        



    }

    public function studentList(){
        $school = school::find(1);
        $getSt = student::join("classes","students.st_class","=", "classes.cla_id")
        ->select("students.*","classes.cla_name")
        ->orderby("students.st_id","DESC")
        ->where("students.st_class", Session::get("tea_cla"))
        ->get();

        return view('studentlist', compact('getSt', 'school'));
    }


    public function sutdentpdf($id){
        $school = school::find(1);
        $st = student::find($id);
        $pdf = PDF::loadView("pdf.studentpdf", compact('st','school'));
        return $pdf->download($st->st_name.".pdf");
    }




}
