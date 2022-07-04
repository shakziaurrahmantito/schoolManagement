  @include("inc.header")
  @include("inc.sidebar")

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <h3>Add Role</h3>
          <hr>

          <form method="post" id="myForm">
            @csrf
            <div class="form-row">
              <div class="col-md-12 my-2">
                <input type="text" class="form-control" required placeholder="Role name" name="role_name">
                <small id="role_name_err"></small>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 my-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" required name="role_status" id="role_status" value="1">
                  <label class="form-check-label" for="role_status">Active</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" required name="role_status" id="role_statu" value="0">
                  <label class="form-check-label" for="role_statu">Inactive</label>
                </div>
              </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>

          <hr>

          <h3>Role List</h3>
        <hr>
        <table id="example" class="display text-center" width="100%">
            <thead>
              <tr>
                <th width="20%">SL</th>
                <th width="40%">Band Name</th>
                <th width="20%">Status</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach($getRole as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->role_name}}</td>
                <td>
                  @if($data->role_status == 1)
                    Active
                  @else
                    Deactive
                  @endif
                </td>
                <td>

                  <a href='{{url("editId/$data->role_id")}}'>
                    <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                  </a>

                  <a onclick="return confirm('Are you sure delete?')" href='{{url("delId/$data->role_id")}}'>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </a>

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




    
  

  </script>



  <!--JavaScript Plugin-->
  <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>

  @include("inc.footer")