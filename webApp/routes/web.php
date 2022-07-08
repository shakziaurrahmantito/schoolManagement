<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\classController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\attendaceController;
use App\Http\Controllers\schoolController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\test;
use App\Models\teacher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => ['checkUser']], function(){

	Route::get("/login",[teacherController::class,"login"]);
	Route::post("/teacherLogin",[teacherController::class,"teacherLogin"])->name("teacherLogin");
});

Route::get("/testJoin",[test::class,"testJoin"]);



Route::get("/pdfview", function(){

	$tea = teacher::find(10);
	return view("pdf.teacherpdf", compact('tea'));


});



Route::get("/test", function(){

	//return $_SERVER['HTTP_USER_AGENT'];
	//return $_SERVER['REMOTE_ADDR'];

	//return Request::getIp();

			//$device=   $request->header('User-Agent');
            //dd($device);

	//return BrowserDetect::browserFamily();

	return view('test');






});




Route::group(['middleware' => ['loginCheck']], function(){

	Route::get("/",[teacherController::class,"dasboard"]);
	Route::get("/addTeacher",[teacherController::class,"teacherAdd"]);
	Route::post("/teacherInsert",[teacherController::class,"teacherInsert"])->name("teacherInsert");
	Route::get("/teacherlist",[teacherController::class,"teacherlist"]);
	Route::get("/logOut",[teacherController::class,"logOut"])->name("logOut");


	Route::get("/teaDownload/{id?}",[teacherController::class,"teaDownload"]);
	Route::get("/teacherDelete/{id?}",[teacherController::class,"teacherDelete"]);




	Route::get("/addClass",[classController::class,"classAdd"]);
	Route::post("/classInsert",[classController::class,"classInsert"])->name('classInsert');
	Route::get("/classDelete/{delId?}",[classController::class,"classDelete"]);

	Route::get("/addRole",[roleController::class,"roleAdd"]);
	Route::post("/insertRole",[roleController::class,"roleInsert"])->name("roleInsert.insertRole");
	Route::get("/delId/{delId?}",[roleController::class,"roleDelete"]);



	Route::get("/student",[studentController::class,"studentAdd"]);
	Route::post("/studentInsert",[studentController::class,"studentInsert"])->name('studentInsert');
	Route::get("/studentList",[studentController::class,"studentList"])->name('studentList');
	Route::get("/sutdentpdf/{id}",[studentController::class,"sutdentpdf"]);
	Route::get("/studentDelete/{id}",[studentController::class,"studentDelete"]);



	Route::get("/attenView",[attendaceController::class,"attenView"])->name('attenView');
	Route::post("/attendanceInsert",[attendaceController::class,"attendanceInsert"])->name('attendanceInsert');
	Route::get("/todayAtten",[attendaceController::class,"todayAtten"]);
	Route::get("/daybydayAtten",[attendaceController::class,"daybydayAtten"]);

	Route::get("daybyday/{myId}",[attendaceController::class,"daybyday"]);
	
	Route::get("month_by_month_attr",[attendaceController::class,"month_by_month_attr"]);
	Route::get("monthly_attr/{id}",[attendaceController::class,"monthly_attr"]);



	Route::get("/school",[schoolController::class,"school"]);
	Route::post("/schoolUpdate",[schoolController::class,"schoolUpdate"])->name("schoolUpdate");


	Route::get("/loglist",[loginController::class,"loglist"]);







});
