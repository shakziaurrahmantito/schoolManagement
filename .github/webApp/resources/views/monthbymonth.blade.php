  @include("inc.header")
  @include("inc.sidebar")

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <div style="overflow:hidden;">
            <h3 class="float-left">Monthly attendance</h3>
            <button class="float-right print btn btn-primary">Print</button>
          </div>
          <hr>
          <div style="overflow:auto;">
        <table id="example" class="display text-center" style="overflow:auto;width: 100%;">
            <thead>
              <tr>
                <th width="5%">SL</th>
                <th width="20%">Date</th>
                <th width="20%">class</th>
                <th width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach($getAttendanceDate as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->attendance_month}}</td>
                <td>{{$getClassName->cla_name}}</td>
                <td><a href='{{url("/monthly_attr/$data->attendance_month")}}' class="btn btn-primary">View</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>

          </div>

      </div>


        </div>

      </div>
    </div>
      </div>
    </div>
  </section>



  <script type="text/javascript">


    
    $("#myForm").submit(function(){
      var form = $("#myForm").get(0);

      $.ajax({
        url : "{{route('roleInsert.insertRole')}}",
        method: "post",
        data : new FormData(form),
        contentType : false,
        processData : false,
        success: function(data){

          var getData = $.trim(data);
          if (getData == 1) {
            window.location = "{{url('addRole')}}";
          }else{
            $("#role_name_err").css("color","red").text("Already exists.");
          }

        }
      });

      return false;


    });

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



  <!--JavaScript Plugin-->
  <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>

  @include("inc.footer")