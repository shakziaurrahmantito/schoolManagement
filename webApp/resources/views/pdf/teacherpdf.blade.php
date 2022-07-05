<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table</title>
    <style type="text/css">
      .logu{
        width: 70px;
      }
      h2{
        margin-bottom: 0;
      }
      h4{
        margin-top: 0;
      }
      .myTable{}
      .myTable tr td{
        padding: 10px;
      }
      
    </style>
  </head>
  <body>

    <table width="100%">
      <tr>
        <td align="center">
          <div style="display: inline-block;height: 50px;">
            <img src="{{asset($school->logu)}}" class="logu">
          </div>
          <div style="display: inline-block;height: 50px;">
            <h2>{{$school->name}}</h2>
            <h4>{{$school->address}}</h4>
          </div>
          <br>
          <br>
        </td>
      </tr>
    </table>
    <hr>
    <table width="100%" style="border: 1px solid;margin-top: 20px;">
      <tr>
        <td align="center">
          <p style="margin: 0;">Teacher Information</p>
        </td>
      </tr>
    </table>
    <table width="100%" class="myTable" style="margin-top: 20px;border: 1px solid;padding: 10px;">

      <tr>
        <td>Name</td>
        <td>:</td>
        <td>{{$tea->tea_name}}</td>
        <td rowspan="9" width="30%" valign="top">
          <img src="{{asset($tea->tea_img)}}" style="height:150px;width:150px">
        </td>
      </tr>
              <tr>
                <td>Father's Name</td>
                <td>:</td>
                <td>{{$tea->tea_father}}</td>
              </tr>

              <tr>
                <td>Mother's Name</td>
                <td>:</td>
                <td>{{$tea->tea_mother}}</td>
              </tr>

              <tr>
                <td>Phone</td>
                <td>:</td>
                <td>{{$tea->tea_phone}}</td>
              </tr>

              <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{$tea->tea_email}}</td>
              </tr>

              <tr>
                <td>Selected Class</td>
                <td>:</td>
                <td>{{$tea->getClass->cla_name}}</td>
              </tr>

               <tr>
                <td>Address</td>
                <td>:</td>
                <td>{{$tea->tea_address}}</td>
              </tr>
              <tr>
                <td>NID</td>
                <td>:</td>
                <td>{{$tea->tea_nid}}</td>
              </tr>
              <tr>
                <td>Designation</td>
                <td>:</td>
                <td>{{$tea->getRole->role_name}}</td>
              </tr>

    </table>

  </body>
</html>