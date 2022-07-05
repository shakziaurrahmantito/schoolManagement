  @include("inc.header")
  @include("inc.sidebar")

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <h3>Add Student</h3>
          <hr>

          @if(Session::get('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif

          <form method="post" id="myForm" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Name" required value="{{old('st_name')}}" name="st_name">
                @error("st_name")
                  <small>{{$message}}</small>
                @enderror
              </div>
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Father's name" required value="{{old('st_father')}}" name="st_father">
                @error("st_father")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Mother's name" value="{{old('st_mother')}}" required name="st_mother">
                @error("st_mother")
                  <small>{{$message}}</small>
                @enderror
              </div>
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Gerdian phone" required value="{{old('st_g_phone')}}" name="st_g_phone">
                @error("st_g_phone")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 my-2">
                <input type="text" class="form-control" value="{{old('st_address')}}" placeholder="Student address" required name="st_address">
                @error("st_address")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>


            <div class="form-row">
          
              <div class="col-md-6 my-2">

                <input type="number" class="form-control" value="{{old('st_ger_nid')}}" min="1" placeholder="Gerdian NID" required name="st_ger_nid">
                @error("st_ger_nid")
                  <small>{{$message}}</small>
                @enderror
              </div>

              <div class="col-md-6 my-2">
                <input type="file" class="form-control" required name="st_ger_img" placeholder="Date of birth" value="{{old('st_ger_img')}}">
                @error("st_ger_img")
                  <small>{{$message}}</small>
                @enderror
              </div>

            </div>

            <div class="form-row">
          
              <div class="col-md-6 my-2">

                <input type="number" class="form-control" value="{{old('st_roll')}}{{$getStRoll+1}}" min="1" placeholder="Class Roll" required name="st_roll">
                <small id="st_roll_error"></small>
                
                @error("st_roll")
                  <small>{{$message}}</small>
                @enderror
              </div>

              <div class="col-md-6 my-2">
                <input type="date" class="form-control" required name="st_dath_of_birth" placeholder="Date of birth" value="{{old('st_dath_of_birth')}}">
                @error("st_dath_of_birth")
                  <small>{{$message}}</small>
                @enderror
              </div>

            </div>




            <div class="form-row">
              <div class="col-md-12 my-2">
                <input type="text" class="form-control" placeholder="Birth registration number" required value="{{old('birth_reg')}}" name="birth_reg">
                @error("birth_reg")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>


            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="file" class="form-control-file" required name="st_img">
                @error("st_img")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 my-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" required name="st_status" id="unit_status" value="1">
                  <label class="form-check-label" for="unit_status">Active</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" required name="st_status" id="unit_statu" value="0">
                  <label class="form-check-label" for="unit_statu">Inactive</label>
                </div>
              </div>
            </div>
            <hr>
            <button class="btn btn-primary">Save</button>
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
        url : "{{route('studentInsert')}}",
        method: "post",
        data : new FormData(form),
        contentType : false,
        processData : false,
        success: function(data){
          var getData = $.trim(data);
          if (getData == 1) {
            alert("Data insert successfully");
            window.location = "{{url('student')}}";
          }else if(data == "exist"){
            $("#st_roll_error").css("color","red").text("Class roll already exists.");
          }else{
            alert(data);
          }

        }
      });

      return false;


    });





    
  

  </script>


  @include("inc.footer")