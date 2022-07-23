<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\role;
use App\Models\classes;

class test extends Controller
{
    public function testJoin(){
        /*$data['joinData'] = teacher::leftjoin("classes","classes.cla_id","teachers.tea_cla")
        ->select("teachers.*","classes.cla_name")
        ->get();*/

        $data['paginate'] = teacher::paginate(5);

        return view("jointest", $data);

    }


    public function teacherlist($id = null){
        if ($id == null) {
            
            $user = teacher::get();
            return response()->json(["teacher"=>$user],200);

        }else{

            $user = teacher::findOrFail($id);
            return response()->json(["teacher"=>$user],200);

        }
    }


}
