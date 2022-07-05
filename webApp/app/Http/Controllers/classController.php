<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classes;

class classController extends Controller
{

    public function classAdd(){
        $getCla = classes::orderby("cla_id","ASC")->get();
        return view('classAdd', compact('getCla'));
    }

    public function classInsert(Request $req){
        $getExists = classes::where("cla_name", $req->cla_name)->count();
        if ($getExists) {
            return "0";
        }else{
            $role = new classes();
            $role->cla_name = $req->cla_name;
            $role->cla_status = $req->cla_status;
            $role->save();
            return "1";
        }
    }


    public function classDelete($id = null){
        classes::where("cla_id", $id)->delete();
        return redirect()->back();
    }



}
