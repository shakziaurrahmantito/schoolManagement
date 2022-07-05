<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>User form</h2>

    <form method="post" action="{{route('testController.insertData')}}" enctype="multipart/form-data" id="myForm">
    @csrf

    <div class="form-group">
      <label for="name">Name</label>
      <input type="name" class="form-control" value="{{old('name')}}" placeholder="Enter name" name="name">
      @error("name")
        <small>{{$message}}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="name">Name2</label>
      <input type="name" class="form-control" value="{{old('name_2')}}" placeholder="Enter name" name="name_2">
      @error("name_2")
        <small>{{$message}}</small>
      @enderror
    </div>

    <!-- <div class="form-group">
      <label for="name">Name</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name[]">
    </div> -->
 

    <button type="submit" class="btn btn-primary" id="submit">Submit</button>

  </form>

</div>




<script type="text/javascript">

    /*$("#submit").click(function(){


      var form = $("#myForm").get(0);

    
      $.ajax({
        
        method : "post",
        data : new FormData(form),
        processData : false,
        contentType : false,
        success : function(data){
          alert(data);
        }

      });



        var name = $("#name").val();
        var _token = $("input[name=_token]").val();


        $.ajax({
          url : "{{Route('testController.insertData')}}",
          method : "post",
          type : "text",
          data : {
              name : name,
              _token : csrf
          },
          success : function(data){
            alert(data);
          }

        });


    });*/

</script>
</body>
</html>