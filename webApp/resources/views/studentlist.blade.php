  @include("inc.header")
  @include("inc.sidebar")

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <div style="overflow:hidden;">
            <h3 class="float-left">Student List</h3>
            <button class="float-right print btn btn-primary">Print</button>
          </div>
          <hr>

          <div style="overflow:auto;">
        <table id="example" class="display text-center" style="min-width: 100%;">
            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Father</th>
                <th>Mother</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Class</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach($getSt as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->st_name}}</td>
                <td>{{$data->st_father}}</td>
                <td>{{$data->st_mother}}</td>
                <td>{{$data->st_g_phone}}</td>
                <td>{{$data->st_address}}</td>
                <td>{{$data->cla_name}}</td>
                <td><img src="{{$data->st_img}}" height="40px" width="40px"></td>
                <td>
                  @if($data->st_status == 1)
                    Active
                  @else
                    Deactive
                  @endif
                </td>
                <td>

                  <a href='{{url("sutdentpdf/$data->st_id")}}'>
                   <!--  <button class="btn btn-primary"><i class="fa fa-edit"></i></button> -->
                   Download
                  </a>

                  <!-- <a onclick="return confirm('Are you sure delete?')" href='{{url("delId/$data->cla_id")}}'>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </a> -->

                </td>
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