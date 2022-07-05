<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\role;

class roleController extends Controller
{
    public function roleAdd(){
        $getRole = role::orderby("role_id","ASC")->get();
        return view('addRole', compact('getRole'));
    }

    public function roleInsert(Request $req){
        $getExists = role::where("role_name", $req->role_name)->count();
        if ($getExists) {
            return "0";
        }else{
            $role = new role();
            $role->role_name = $req->role_name;
            $role->role_status = $req->role_status;
            $role->save();
            return "1";
        }
    }


    public function roleDelete($id = null){
        role::where("role_id", $id)->delete();
        return redirect()->back();

    }

}
