  @include("inc.header")
  @include("inc.sidebar")

  <?php

    use App\Models\attendance;
    use App\Models\student;
    use App\Models\classes;
    use Illuminate\Support\Facades\Session;

  ?>

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <h3></h3>
          <div style="overflow:hidden;">
            <h3 class="float-left">{{$getMonth}} attendance count list</h3>
            <button class="float-right print btn btn-primary">Print</button>
          </div>
          <hr>

            <table class="table">
              <tr>
                <th>Roll</th>
                <th>Name</th>
                <th>Month</th>
                <th>Class</th>
                <th>Attendance</th>
              </tr>

              @php
                $count = 0;
              @endphp



              @foreach($getStudentId as $data)

              <?php 

                  $getStData = student::where('st_id', $data->st_id)->first();
              ?>

              <tr>
                <td>{{$getStData->st_roll}}</td>
                <td>{{$getStData->st_name}}</td>
                <td>{{$getMonth}}</td>
                <td>{{$getClassName->cla_name}}</td>
                <td><?php 

                  $getAttrData = attendance::where('st_id', $data->st_id)
                  ->where("attendance_month",$getMonth)
                  ->get();

                  $count = 0;

                  foreach($getAttrData as $getAtten){

                    if ($getAtten->attendance == "P") {
                      $count += 1;
                    }
                  }

                  echo $count;

               



              ?></td>
              </tr>


              @endforeach

            </table>

        </div>
      </div>
    </div>
      </div>
    </div>
  </section>



  <script type="text/javascript">


    $(".print").click(function(){
      $("table").printThis({
        base : "{{url()->full()}}",
        header : "<br><h2 class='text-center'><?php
          if (isset($school->name)) {
            echo $school->name;
          }
        ?></h2><h2 class='text-center'><?php
          if (isset($school->address)) {
            echo $school->address;
          }
        ?></h2><hr>"
      });
    });





    
  

  </script>


  @include("inc.footer")