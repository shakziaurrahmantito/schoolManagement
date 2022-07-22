<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Panel</title>
    <link rel="shortcut icon" href="{{asset('img/icon.png')}}">
    <link rel="stylesheet" href="{{asset('css/uikit.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- <script src="js/jquery.min.js"></script> -->

    <script src="{{asset('js/jquery.min.js')}}"></script>

    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/uikit.min.js')}}"></script>
    <script src="{{asset('js/uikit-icons.min.js')}}"></script>
    <style type="text/css">
      
      body{background: #ddd;}

    </style>
  </head>
  <body style="background: #ddd;">

    <section class="my-5 p-3 py-5" style="max-width: 450px;margin: auto;">
      <div class="card">
        <div class="card-body">

          <form class="py-5" method="post" id="reset">
            @csrf
            <h6 class="text-center" id="msg"></h6>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" id="email" class="form-control" placeholder="Email address">
              <small id="erremail" class="form-text" style="color:red;"></small>
            </div>
            <input type="submit" value="Reset" class="btn btn-primary">
          </form>

        </div>
      </div>

    </section>


    <script type="text/javascript">
      

  $("#reset").submit(function(){

      if ($('#email').val() == "") {
        $("#erremail").text("Field must not be empty.");
        return false;
      }else{
        $("#erremail").text("");
      }



      if ($('#email').val() !== "") {

          var form = $("#reset").get(0);

          $.ajax({
          url : "{{url('/resetPassword')}}",
          method : "post",
          data : new FormData(form),
          processData : false,
          contentType : false,
          
          success : function(data){

          	if(data.message == 0){
          		$("#msg").addClass("text-danger").text("Email address not found!").removeClass("text-success");
          	}else{
          		$("#msg").text("We are sent reset link "+data.message).addClass("text-success").removeClass("text-danger");
          		$("#reset")[0].reset();
          	}

          	//alert(data);

             /*if ($.trim(data) == 0) {
                $("#msg").text("Email or pasword no match!");
              }else{
                window.location.assign("{{url('/')}}");
              }*/
          }

        });

      }

      return false;

    });


    </script>
  </body>
</html>