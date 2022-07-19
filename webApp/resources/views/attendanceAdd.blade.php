  @include("inc.header")
  @include("inc.sidebar")

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <h3>Attendance Now</h3>
          <hr>

          @if(Session::get('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif

          <form method="post" id="myForm">
            @csrf

            <table class="table">
              <tr>
                <th>Roll</th>
                <th>Name</th>
                <th>Attendance</th>
              </tr>

              @foreach($getSt as $data)

              <input type="hidden" value="{{$data->st_id}}" name="st_id[]">

              <tr>
                <td>{{$data->st_roll}}</td>
                <td>{{$data->st_name}}</td>
                <td>
                  
                  <input type="hidden" value="{{$data->st_email}}" name="str_email[]">
                  <input type="hidden" value="{{$data->st_name}}" name="st_name[]">

                  <input type="radio" required value="P" name="atten[{{$data->st_roll}}]"> P
                  <input type="radio" required value="A" name="atten[{{$data->st_roll}}]"> A
                </td>
              </tr>

              @endforeach

            </table>

            
            <hr>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
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
        url : "{{route('attendanceInsert')}}",
        method: "post",
        data : new FormData(form),
        contentType : false,
        processData : false,
        success: function(data){
          var getData = $.trim(data);
          if (getData == 1) {
            alert("Data insert successfully");
            window.location = "{{url('attenView')}}";
          }else if(data == 0){
            alert("Attendace already exists.");
          }else{
            alert(data);
          }

        }
      });

      return false;


    });





    
  

  </script>


  @include("inc.footer")