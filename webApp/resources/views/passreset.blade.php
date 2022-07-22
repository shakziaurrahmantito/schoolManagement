<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Panel</title>
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

          <form class="py-5" method="post" id="login">
           
            <hr>
            @csrf
            <h6 class="text-center text-danger" id="msg"></h6>
            <div class="form-group">
              <label>New Password</label>
              <input type="hidden" name="email" value="{{$email}}">
              <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
              <small id="errpassword" class="form-text" style="color:red;"></small>
            </div>

            <input type="submit" value="Change" class="btn btn-primary">

          </form>

        </div>
      </div>

    </section>


    <script type="text/javascript">
      

  $("#login").submit(function(){



      if ($('#password').val() == "") {
        $("#errpassword").text("Field must not be empty.");
        return false;
      }else{
        $("#errpassword").text("");
      }

      if ($('#password').val() !== "") {

          var form = $("#login").get(0);

          $.ajax({
          url : "{{Route('resetpasswordInsert')}}",
          method : "post",
          data : new FormData(form),
          processData : false,
          contentType : false,
          success : function(data){

          	if(data.message == 1){
          		$("#msg").addClass("text-success").text("Password change successfully!").removeClass("text-danger");
          		$('#login')[0].reset();
          	}else{
          		$("#msg").addClass("text-danger").text("Password not changed").removeClass("text-success");
          		$('#login')[0].reset();
          	}

          }

        });

      }

      return false;

    });


    </script>
  </body>
</html>