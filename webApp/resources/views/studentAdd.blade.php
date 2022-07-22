  @include("inc.header")
  @include("inc.sidebar")

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <h3>Add Student</h3>
          <hr>

    
          <div class="alert alert-success msg" style="display:none;"></div>

          <form method="post" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Name"name="st_name">
                <small id="st_name_error" class="form-text text-muted"></small>
              </div>
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Father's name" name="st_father">
               <small id="st_father_error" class="form-text text-muted"></small>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Mother's name" name="st_mother">
               <small id="st_mother_error" class="form-text text-muted"></small>
              </div>
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Gerdian phone" name="st_g_phone">
                <small id="st_g_phone_error" class="form-text text-muted"></small>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Email address" name="st_email">
                <small id="st_email_error" class="form-text text-muted"></small>
              </div>
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Student address" name="st_address">
                <small id="st_address_error" class="form-text text-muted"></small>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="number" class="form-control" min="1" placeholder="Gerdian NID" name="st_ger_nid">
                <small id="st_ger_nid_error" class="form-text text-muted"></small>
              </div>
              <div class="col-md-6 my-2">
                <input type="file" class="form-control" id="st_ger_img" name="st_ger_img" placeholder="Date of birth">
                <small id="st_ger_img_error" class="form-text text-muted"></small>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="number" class="form-control" value="{{old('st_roll')}}{{$getStRoll+1}}" min="1" placeholder="Class Roll" name="st_roll">
                <small id="st_roll_error" class="form-text text-muted"></small>
              </div>
              <div class="col-md-6 my-2">
                <input type="date" class="form-control" name="st_dath_of_birth" placeholder="Date of birth">
                <small id="st_dath_of_birth_error" class="form-text text-muted"></small>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 my-2">
                <input type="text" class="form-control" placeholder="Birth registration number" name="birth_reg">
                <small id="birth_reg_error" class="form-text text-muted"></small>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="file" class="form-control-file" name="st_img">
               <small id="st_img_error" class="form-text text-muted"></small>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 my-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="st_status" id="unit_status" value="1">
                  <label class="form-check-label" for="unit_status">Active</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="st_status" id="unit_statu" value="0">
                  <label class="form-check-label" for="unit_statu">Inactive</label>
                </div>
                <small id="st_status_error" class="form-text text-muted"></small>
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
        beforeSend : function(){
          $(document).find(".form-text").text("");
        },
        success: function(data){

          if (data.status == 0) {
            $.each(data.message, function(prefix, values){
              $("#"+prefix+"_error").text(values);
            });
          }else if(data.roll_exists == 1){
            $(document).find(".form-text").text("");
            $("#st_roll_error").text("This is roll already exists.");
          }else{
            $(".msg").css("display","block").text("Student data added successfully!");
            var getRoll = $("input[name=st_roll]").val();
            var count = parseInt(getRoll)+1;
            $("#myForm")[0].reset();
            $("input[name=st_roll]").val(count);
          }

        
          
          /*var getData = $.trim(data);
          if (getData == 1) {
            alert("Data insert successfully");
            window.location = "{{url('student')}}";
          }else if(data == "exist"){
            $("#st_roll_error").css("color","red").text("Class roll already exists.");
          }else{
            alert(data);
          }*/



        }
      });

      return false;


    });


    $("#st_ger_img").change(function(){

      var file = document.getElementById("st_ger_img").files[0];
      var reader = new FileReader();
      reader.onload = function(e){
        alert(this.width);
      };
      reader.readAsDataURL(file);

    });





    
  

  </script>


  @include("inc.footer")