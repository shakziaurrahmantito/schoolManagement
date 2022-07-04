<?php 
  use App\Models\teacher;
  use Illuminate\Support\Facades\URL;
  $getLogin = teacher::where("tea_id", Session::get('tea_id'))->first();

?>
<section class="container-fluid">
  <div class="row">
    <div class="col-md-2 bg-dark" style="min-height: 550px;">
      <div id="accordian">
        <ul class="list-unstyled side-menu my-3">
                <li class="p-1"><a href="{{url('/')}}"><i class="fa fa-home"></i>Dashboard</a>
                </li>
              
              <!-- For headmaster -->

              @if($getLogin->tea_role == 1 && $getLogin->tea_cla == 0)
              <li class="p-1"><a href="#select-1" data-toggle="collapse"><i class="fa fa-user"></i>Setup</a>
                  <ul class="collapse <?php 

                    if(Request::path() == "addRole" || Request::path() == "addClass" || Request::path() == "school"){
                      echo "show";
                    }

                ?> list-unstyled ml-4" id="select-1" data-parent="#accordian">
                    <li><a href="{{url('/addRole')}}">Add Role</a></li>
                    <li><a href="{{url('/addClass')}}">Add Class</a></li>
                    <li><a href="{{url('/school')}}">Institution</a></li>
                  </ul>
              </li>
              <li class="p-1"><a href="#select-2" class="" data-toggle="collapse"><i class="fa fa-bandcamp"></i>Teacher</a>
                  <ul class="collapse <?php 

                    if(Request::path() == "addTeacher" || Request::path() == "teacherlist"){
                      echo "show";
                    }

                ?> list-unstyled ml-4" id="select-2" data-parent="#accordian">
                    <li><a href="{{url('/addTeacher')}}">Add Teacher</a></li>
                    <li><a href="{{url('/teacherlist')}}">Teacher List</a></li>
                  </ul>
              </li>
              @endif



              <!-- For Class Teacher -->

              @if($getLogin->tea_role == 2)

              <li class="p-1"><a href="#select-3" class="" data-toggle="collapse"><i class="fa fa-meetup"></i>Student</a>
                  <ul class="collapse <?php 

                    if(Request::path() == "student" || Request::path() == "studentList"){
                      echo "show";
                    }

                ?> list-unstyled ml-4" id="select-3" data-parent="#accordian">
                    <li><a href="{{url('/student')}}">Add Student</a></li>
                    <li><a href="{{url('/studentList')}}">Student List</a></li>
                  </ul>
              </li>


              <li class="p-1"><a href="#select-4" class="" data-toggle="collapse"><i class="fa fa-podcast"></i>Attendance</a>
                  <ul class="collapse <?php 

                    if(Request::path() == "attenView"){
                      echo "show";
                    }

                ?> list-unstyled ml-4" id="select-4" data-parent="#accordian">
                    <li><a href="{{url('/attenView')}}">Attendance Now</a></li>
                  </ul>
              </li>

              <li class="p-1"><a href="#select-5" class="" data-toggle="collapse"><i class="fa fa-th-large"></i>Report</a>
                  <ul class="collapse <?php 

                    if(Request::path() == "todayAtten" || Request::path() == "daybydayAtten" || Request::path() == "month_by_month_attr"){
                      echo "show";
                    }

                ?> list-unstyled ml-4" id="select-5" data-parent="#accordian">
                    <li><a href="{{url('/todayAtten')}}">Today Atten</a></li>
                    <li><a href="{{url('/daybydayAtten')}}">Date Atten</a></li>
                    <li><a href="{{url('/month_by_month_attr')}}">Monthly Atten</a></li>
                  </ul>
              </li>

              @endif

              <!-- For Headmaster class teacher -->

              @if($getLogin->tea_role == 1 && $getLogin->tea_cla !== 0)




              <li class="p-1"><a href="#select-1" data-toggle="collapse"><i class="fa fa-user"></i>Setup</a>
                  <ul class="collapse <?php 

                    if(Request::path() == "addRole" || Request::path() == "addClass" || Request::path() == "school"){
                      echo "show";
                    }

                ?> list-unstyled ml-4" id="select-1" data-parent="#accordian">
                    <li><a href="{{url('/addRole')}}">Add Role</a></li>
                    <li><a href="{{url('/addClass')}}">Add Class</a></li>
                    <li><a href="{{url('/school')}}">Institution</a></li>
                  </ul>
              </li>
              <li class="p-1"><a href="#select-2" class="" data-toggle="collapse"><i class="fa fa-bandcamp"></i>Teacher</a>
                  <ul class="collapse <?php 

                    if(Request::path() == "addTeacher" || Request::path() == "teacherlist"){
                      echo "show";
                    }

                ?> list-unstyled ml-4" id="select-2" data-parent="#accordian">
                    <li><a href="{{url('/addTeacher')}}">Add Teacher</a></li>
                    <li><a href="{{url('/teacherlist')}}">Teacher List</a></li>
                  </ul>
              </li>

               <li class="p-1"><a href="#select-3" class="" data-toggle="collapse"><i class="fa fa-meetup"></i>Student</a>
                  <ul class="collapse <?php 

                    if(Request::path() == "student" || Request::path() == "studentList"){
                      echo "show";
                    }

                ?> list-unstyled ml-4" id="select-3" data-parent="#accordian">
                    <li><a href="{{url('/student')}}">Add Student</a></li>
                    <li><a href="{{url('/studentList')}}">Student List</a></li>
                  </ul>
              </li>


              <li class="p-1"><a href="#select-4" class="" data-toggle="collapse"><i class="fa fa-podcast"></i>Attendance</a>
                  <ul class="collapse <?php 

                    if(Request::path() == "attenView"){
                      echo "show";
                    }

                ?> list-unstyled ml-4" id="select-4" data-parent="#accordian">
                    <li><a href="{{url('/attenView')}}">Attendance Now</a></li>
                  </ul>
              </li>

              <li class="p-1"><a href="#select-5" class="" data-toggle="collapse"><i class="fa fa-th-large"></i>Report</a>
                  <ul class="collapse <?php 

                    if(Request::path() == "todayAtten" || Request::path() == "daybydayAtten" || Request::path() == "month_by_month_attr"){
                      echo "show";
                    }

                ?> list-unstyled ml-4" id="select-5" data-parent="#accordian">
                    <li><a href="{{url('/todayAtten')}}">Today Atten</a></li>
                    <li><a href="{{url('/daybydayAtten')}}">Date Atten</a></li>
                    <li><a href="{{url('/month_by_month_attr')}}">Monthly Atten</a></li>
                  </ul>
              </li>

              @endif



              <li class="p-1"><a href="#select-11" class="" data-toggle="collapse"><i class="fa fa-sign-out"></i>Logout</a>
                  <ul class="collapse <?php 

                    if(Request::path() == "logOut"){
                      echo "show";
                    }

                ?> list-unstyled ml-4" id="select-11" data-parent="#accordian">
                    <li><a href="{{Route('logOut')}}">Logout</a></li>
                  </ul>
              </li>


        </ul>
      </div>
  </div>