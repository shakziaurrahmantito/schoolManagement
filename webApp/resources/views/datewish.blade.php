  @include("inc.header")
  @include("inc.sidebar")

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <h3></h3>
          <div style="overflow:hidden;">
            <h3 class="float-left">{{$getDate}} attendance list</h3>
            <button class="float-right print btn btn-primary">Print</button>
          </div>
          <hr>

            <table class="table">
              <tr>
                <th>Roll</th>
                <th>Name</th>
                <th>Date & Time</th>
                <th>Class</th>
                <th>Attendance</th>
              </tr>

              @foreach($getSt as $data)

              <tr>
                <td>{{$data->st_roll}}</td>
                <td>{{$data->st_name}}</td>
                
                <td><?php echo date("d-F-y h:i:s a",strtotime($data->created_at));?></td>
                <td>{{$data->cla_name}}</td>
                <td>{{$data->attendance}}</td>
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