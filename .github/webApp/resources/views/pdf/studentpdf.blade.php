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
          <p style="margin: 0;">Student Information</p>
        </td>
      </tr>
    </table>
    <table width="100%" class="myTable" style="margin-top: 20px;border: 1px solid;padding: 10px;">

      <tr>
        <td>Name</td>
        <td>:</td>
        <td>{{$st->st_name}}</td>
        <td rowspan="4" width="30%" valign="top">
          <img src="{{asset($st->st_img)}}" style="height:150px;width:150px">
        </td>
      </tr>
      <tr>
          <td>Father's Name</td>
          <td>:</td>
          <td>{{$st->st_father}}</td>
        </tr>

          <tr>
            <td>Mother's Name</td>
            <td>:</td>
            <td>{{$st->st_mother}}</td>
          </tr>

          <tr>
            <td>Gerdian Phone</td>
            <td>:</td>
            <td>{{$st->st_g_phone}}</td>
          </tr>

          <tr>
            <td>Address</td>
            <td>:</td>
            <td>{{$st->st_address}}</td>
          </tr>

          <tr>
            <td>Roll</td>
            <td>:</td>
            <td>{{$st->st_roll}}</td>
          </tr>

          <tr>
            <td>Date of birth</td>
            <td>:</td>
            <td>{{$st->st_dath_of_birth}}</td>
          </tr> 

          <tr>
            <td>Birth registation</td>
            <td>:</td>
            <td>{{$st->birth_reg}}</td>
          </tr>

          <tr>
            <td>Class</td>
            <td>:</td>
            <td>{{$st->getClass->cla_name}}</td>
          </tr>

          <tr>
            <td>Girdian NID</td>
            <td>:</td>
            <td>{{$st->st_ger_nid}}</td>
            <td rowspan="9" width="30%" valign="top">
              <img src="{{asset($st->st_ger_img)}}" style="height:150px;width:150px">
            </td>
          </tr>

          

    </table>

  </body>
</html>