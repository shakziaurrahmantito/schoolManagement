  @include("inc.header")
  @include("inc.sidebar")

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <div style="overflow:hidden;">
            <h3 class="float-left">Teacher List</h3>
            <button class="float-right print btn btn-primary">Print</button>
          </div>
          <hr>
          <div style="overflow:auto;">
        <table id="example" class="display text-center" style="overflow:auto;width: 100%;">
            <thead>
              <tr>
                <th width="5%">SL</th>
                <th width="20%">Name</th>
                <th width="20%">Email</th>
                <th width="15%">Phone</th>
                <th width="5%">Role</th>
                <th width="5%">Class</th>
                <th width="5%">Image</th>
                <th width="5%">Status</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach($getTea as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->tea_name}}</td>
                <td>{{$data->tea_email}}</td>
                <td>{{$data->tea_phone}}</td>
                <td>{{$data->getRole->role_name}}</td>
                <td>
                  @if($data->getClass)
                    {{$data->getClass->cla_name}}
                  @else
                    N/A
                  @endif
                </td>
                <td><img src="{{$data->tea_img}}" height="40px" width="40px"></td>
                <td>
                  @if($data->tea_status == 1)
                    Active
                  @else
                    Deactive
                  @endif
                </td>
                <td>

                  <a href='{{url("teaDownload/$data->tea_id")}}'>
                    <!-- <button class="btn btn-primary"><i class="fa fa-edit"></i></button> -->
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