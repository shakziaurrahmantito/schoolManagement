<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\people;
use Illuminate\Support\Str;
//use Illuminate\Support\Facades\Session;

class testController extends Controller
{

    public function insert(Request $req){

       /*Session::put("name","Md. Ziaur Rahman");
       Session::put("age"," and age is 20");
       echo Session::has("name");
       echo Session::has("age");
       Session::forget("name");
       Session::forget("age");
       echo Session::get("name");
       echo Session::get("age");*/

       /*$req->session()->put("name","Md. Ziaur Rahman");
       echo $req->session()->has("name");
       echo $req->session()->forget("name");
       echo $req->session()->get("name");*/

    }



    public function selectData(){

        $data = people::find(2)->delete();

        /*foreach($data as $name){
            echo $name->name;
        }*/

    }

    public function updatePeople(){

        $data = people::where("id","2")->update([
            'name' => "tito"
        ]);

        return "1";

    }

    public function testController($data = null){
        return "Welcome ".$data;
    }


    public function client(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/1');
        return $response->json();
    }

    public function clientPost(){
        $response = Http::post('https://jsonplaceholder.typicode.com/posts',[
            "userId" => 1,
            "title" => "This is title",
            "body" => "This is body"
        ]);
        return $response->json();
    }


    public function clientUpdate(){
        $response = Http::put('https://jsonplaceholder.typicode.com/posts/1',[
            "userId" => 1,
            "title" => "This is title",
            "body" => "This is body"
        ]);
        return $response->json();
    } 

    public function clientDelete($id){
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/'.$id);
        return $response->json();
    }

    public function str(Request $req){
        //return Str::of("I am a student i am a student")->after("am");
        //return Str::of("I am a student i am a student")->afterlast("am");
        //return Str::of("I am ")->append("student");
        //return Str::of("I am ")->lower("student");
        //return Str::of("I am ")->upper("student");
        //return Str::of("I am teacher")->replace("am","have");
        //return Str::of("Iamteacher")->substr(0,5);
        //return Str::of("Iamteacher")->title();
        //return Str::of("Iamteacher")->slug();
        //return Str::of("Iamteacher")->trim(" ");

    }






}
