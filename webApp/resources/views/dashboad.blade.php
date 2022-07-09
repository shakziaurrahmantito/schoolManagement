  @include("inc.header")
  @include("inc.sidebar")

<?php 
  use App\Models\teacher;
  use App\Models\school;
  $getSchool = school::first();
  $getLogin = teacher::where("tea_id", Session::get('tea_id'))->first();

?>

  <style type="text/css">
      body{
            background: #f3f3f3;
      }
      .dashboard{}
      .dashboard i{font-size: 35px;}
      .dashboard p{font-size: 18px;}
      .dashboard h5{font-size: 24px;}
</style>

  <div class="col-md-10">
      <div class="row mt-2 mb-4 dashboard">


            @if($getLogin->tea_role == 1 && $getLogin->tea_cla == 0)

            <div class="col-md-8 my-2">
                  <div class="card">
                        <div class="card-body">
                              <h3>Welcome to...{{$getLogin->tea_name}}</h3>

                              <table class="table">
                                    <tr>
                                          <td colspan="3" align="center">
                                                <img src="{{asset($getSchool->logu)}}" style="height: 150px;padding: 10px;">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>Institute Name</td>
                                          <td>:</td>
                                          <td>
                                                @if(isset($getSchool->name))
                                                      {{$getSchool->name}}
                                                @endif
                                          </td>
                                    </tr><tr>
                                          <td>Email Address</td>
                                          <td>:</td>
                                          <td>
                                                @if(isset($getSchool->email))
                                                      {{$getSchool->email}}
                                                @endif
                                          </td>
                                    </tr><tr>
                                          <td>Phone</td>
                                          <td>:</td>
                                          <td>
                                                @if(isset($getSchool->phone))
                                                      {{$getSchool->phone}}
                                                @endif
                                          </td>
                                    </tr><tr>
                                          <td>Address</td>
                                          <td>:</td>
                                          <td>
                                                @if(isset($getSchool->address))
                                                      {{$getSchool->address}}
                                                @endif
                                          </td>
                                    </tr><tr>
                                          <td>Establish name</td>
                                          <td>:</td>
                                          <td>
                                                @if(isset($getSchool->establish_name))
                                                      {{$getSchool->establish_name}}
                                                @endif
                                          </td>
                                    </tr><tr>
                                          <td>Establish Date</td>
                                          <td>:</td>
                                          <td>
                                                @if(isset($getSchool->establish_date))
                                                      {{$getSchool->establish_date}}
                                                @endif
                                          </td>
                                    </tr>
                              </table>

                        </div>
                  </div>
            </div>

            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body">
                              <p>Summery</p>
                              <hr>
                              <table class="table">
                                    <tr>
                                          <td>Total Teacher</td>
                                          <td>:</td>
                                          <td>{{$totalTeacher}}</td>
                                    </tr>

                                    <tr>
                                          <td>Total Student</td>
                                          <td>:</td>
                                          <td>{{$totalStudent}}</td>
                                    </tr>

                                    <tr>
                                          <td>Total Section</td>
                                          <td>:</td>
                                          <td>{{$totalClass}}</td>
                                    </tr>

                              </table>
                        </div>
                  </div>
            </div>

            <div class="col-md-12 my-2">
                  <div class="card">
                        <div class="card-body">
                              <p>Login information</p>
                              <hr>
                              <div id="chart-container"></div>
                        </div>
                  </div>
            </div> 

            @else

            
            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-money" aria-hidden="true"></i>
                              <p class="mt-2 mb-0">{{$currentTotalStudent}}</p>
                              <h5 class="m-0">Total Student</h5>
                        </div>
                  </div>
            </div>            
           
            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-btc" aria-hidden="true"></i>
                              @if($todayPresent == 0)
                                    <p class="mt-2 mb-0">N/A</p>
                              @else
                              <p class="mt-2 mb-0">{{$todayPresent}}</p>
                              @endif
                              <h5 class="m-0">Today Present</h5>
                        </div>
                  </div>
            </div>            

            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-user-plus" aria-hidden="true"></i>
                               @if($todayAbsent == 0)
                                    <p class="mt-2 mb-0">N/A</p>
                              @else
                              <p class="mt-2 mb-0">{{$todayAbsent}}</p>
                              @endif
                              <h5 class="m-0">Today Absent</h5>
                        </div>
                  </div>
            </div>            

            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-product-hunt"></i>
                              @if($totalClass == 0)
                                    <p class="mt-2 mb-0">N/A</p>
                              @else
                              <p class="mt-2 mb-0">{{$totalClass}}</p>
                              @endif
                              <h5 class="m-0">Total Class</h5>
                        </div>
                  </div>
            </div>           

            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-first-order" aria-hidden="true"></i>
                              @if($totalStudent == 0)
                                    <p class="mt-2 mb-0">N/A</p>
                              @else
                              <p class="mt-2 mb-0">{{$totalStudent}}</p>
                              @endif
                              <h5 class="m-0">Sub Total Student</h5>
                        </div>
                  </div>
            </div>            

            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-pause" aria-hidden="true"></i>
                              @if($disabledStudent == 0)
                                    <p class="mt-2 mb-0">N/A</p>
                              @else
                              <p class="mt-2 mb-0">{{$disabledStudent}}</p>
                              @endif
                              <h5 class="m-0">Deactivate Student</h5>
                        </div>
                  </div>
            </div>            

            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-list"></i>
                              @if($countinueStudent == 0)
                                    <p class="mt-2 mb-0">N/A</p>
                              @else
                              <p class="mt-2 mb-0">{{$countinueStudent}}</p>
                              @endif
                              <h5 class="m-0">Continue Student</h5>
                        </div>
                  </div>
            </div>            
            
            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-eercast" aria-hidden="true"></i>
                              @if(isset($selected_class->cla_name))
                                    <p class="mt-2 mb-0">{{$selected_class->cla_name}}</p>
                              @else
                                    <p class="mt-2 mb-0">N/A</p>
                              @endif
                              <h5 class="m-0">Selected Class</h5>
                        </div>
                  </div>
            </div>


            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-stop-circle-o" aria-hidden="true"></i>
                              @if($attendanceStatus == 0)
                                    <p class="mt-2 mb-0">N/A</p>
                              @else
                              <p class="mt-2 mb-0">Today Token</p>
                              @endif
                              <h5 class="m-0">Attendance Status</h5>
                        </div>
                  </div>
            </div>

            @endif
          

      </div>
 </div>


    </div>
  </section>

      <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
      <script type="text/javascript">

            var datas = <?php echo json_encode($chartData); ?>;

            Highcharts.chart('chart-container',{
                  title : {
                        text: "Teacher Login chart"
                  },
                  subtitle:{
                        text : "By Shak Ziaur Rahman Tito"
                  },
                  xAxis:{
                        categories:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dece']
                  },
                  yAxis:{
                        title : {
                              text : "Count Login"
                        }
                  },
                  legend : {
                        layout : 'vertical',
                        align: 'right',
                        verticalAlign : "middle"
                  },
                  plotOptions : {
                        series : {
                              allowPointSelect : true
                        }                       
                  },
                  series: [{
                        name: "Login",
                        data: datas
                  }],
                  responsive: {
                        rules: [
                              {
                                    condition : {
                                          maxWidth: 500
                                    },
                                    chartOptions:{
                                          legend: {
                                                layout : 'horizontal',
                                                align : 'center',
                                                verticalAlign: 'bottom'
                                          }
                                    }
                              }
                        ]
                  }

            })
                  
      </script>



  <!--JavaScript Plugin-->
  <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>

  @include("inc.footer")