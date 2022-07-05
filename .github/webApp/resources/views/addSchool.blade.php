  @include("inc.header")
  @include("inc.sidebar")

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <h3>Institute Setup</h3>
          <hr>

          @if(Session::get('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif

          <form method="post" id="myForm" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
              <div class="col-md-12 my-2">
                <input type="text" class="form-control" placeholder="Institue name" required value="<?php 
                  if(isset($school->name)){
                    echo $school->name;
                  }
              ?>" name="name">
                @error("name")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">

              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Email address" required value="<?php 
                  if(isset($school->email)){
                    echo $school->email;
                  }?>" name="email">
                @error("email")
                  <small>{{$message}}</small>
                @enderror
              </div>


              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Phone" value="<?php 
                  if(isset($school->phone)){
                    echo $school->phone;
                  }?>" required name="phone">
                @error("phone")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">

              <div class="col-md-12 my-2">
                <input type="text" class="form-control" value="<?php 
                  if(isset($school->address)){
                    echo $school->address;
                  }?>" placeholder="Institute address" required name="address">
                @error("address")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">
          
      
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" required name="establish_name" placeholder="Establish name" value="<?php 
                  if(isset($school->establish_name)){
                    echo $school->establish_name;
                  }?>">
                @error("establish_name")
                  <small>{{$message}}</small>
                @enderror
              </div>


              <div class="col-md-6 my-2">
                <input type="date" class="form-control" required name="establish_date" placeholder="Establish name" value="<?php 
                  if(isset($school->establish_date)){
                    echo $school->establish_date;
                  }?>">
                @error("establish_date")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>


            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="file" class="form-control-file" required name="logu">
                @error("logu")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>
            <hr>
            <button class="btn btn-primary">Change</button>
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
        url : "{{route('schoolUpdate')}}",
        method: "post",
        data : new FormData(form),
        contentType : false,
        processData : false,
        success: function(data){
          var getData = $.trim(data);

          if (getData == 1) {
            alert("Data insert successfully");
            window.location = "{{url('school')}}";
          }else if (getData == 2) {
            alert("Data insert Updated");
            window.location = "{{url('school')}}";
          }else if(data == "exist"){
            $("#img_error").css("color","red").text("Image only upload jpg, png.");
          }else{
            alert(data);
          }

        }
      });

      return false;


    });





    
  

  </script>


  @include("inc.footer")