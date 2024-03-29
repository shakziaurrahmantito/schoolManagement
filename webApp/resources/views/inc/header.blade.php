<?php 
  use App\Models\teacher;
  use App\Models\school;
  $getLogin = teacher::where("tea_id", Session::get('tea_id'))->first();
  $getSchool = school::first();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/uikit.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!--JavaScript-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/uikit.min.js')}}"></script>
    <script src="{{asset('js/uikit-icons.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('js/printThis.js')}}"></script>
    <style type="text/css">
      .side-menu{}
      .side-menu li{font-size: 18px;
          border-bottom: 1px solid #9db3c9;
          margin-top: 10px;
        }
      .side-menu li:last-child{
        border-bottom: none;
      }
      .side-menu li a{color: #eedddd;}
      .side-menu li i{margin-right: 10px;}
      .side-menu li ul li{
        font-size: 18px;
        border-bottom: none;
        margin-top: 10px;
      }
      .side-menu li a:hover{
        color: #b39292;
      }
      .side-menu li a:hover{
        text-decoration: none;
      }
      .navbar-nav li a{
        font-size: 18px;
      }
      .navbar-nav li a i{
        font-size: 18px;
        margin-right: 5px;
      }
    </style>
  </head>
  <body>

    <!--Navbar-->

    <nav class="navbar navbar-dark bg-dark navbar-expand-md sticky-top">
      <!-- <div class="container"> -->
        <!-- <a href="" class="navbar-brand">Online Shopping</a> -->
        <button data-target="#myNav" data-toggle="collapse" class="navbar-toggler navbar-toggler-right"><span class="navbar-toggler-icon"></span></button>
        <div class="navbar-collapse collapse" id="myNav">
          
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="">

                <img style="height:30px;width: 30px;border-radius: 50%;" src="<?php
              if (isset($getSchool->logu)) {
                echo asset($getSchool->logu);
              }
          ?>">
              @if(isset($getSchool->name) && isset($getSchool->address))
                {{$getSchool->name}}, 
                {{$getSchool->address}}
              @endif
            </a></li>

          </ul>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="">Welcome! <?php
              if (isset($getLogin->tea_name)) {
                echo $getLogin->tea_name;
              }
          ?></a></li>
            <li class="nav-item" title="Change your image"><a class="nav-link" href="">
              <img style="height:30px;width: 30px;border-radius: 50%;" src="<?php
              if (isset($getLogin->tea_img)) {
                echo asset($getLogin->tea_img);
              }
          ?>">
            </a></li>
          </ul>
        </div>

    </nav>