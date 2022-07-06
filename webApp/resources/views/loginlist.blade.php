  @include("inc.header")
  @include("inc.sidebar")

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <div style="overflow:hidden;">
            <h3 class="float-left">Login List</h3>
            <button class="float-right print btn btn-primary">Print</button>
          </div>
          <hr>
          <div style="overflow:auto;">
        <table id="example" class="display" style="overflow:auto;width: 100%;">
            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Browser</th>
                <th>IP</th>
                <th>Time & Date</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach($loginfo as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->browser}}</td>
                <td>{{$data->user_ip}}</td>
                <?php 

                    date_default_timezone_set("Asia/Dhaka");

                ?>
                <td>{{date("h:i:s a d-m-Y", strtotime($data->created_at))}}</td>
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
    </div>
  </section>

  <script type="text/javascript">

    $(".print").click(function(){
      $("table").printThis({
        base : "{{url()->full()}}",
        header : "<br><h2 class='text-center'><?php
          if (isset($school->name)) {
            echo $school->name;
          }
        ?></h2><h2 class='text-center'><?php
          if (isset($school->address)) {
            echo $school->address;
          }
        ?></h2><hr>"
      });
    });

  </script>

  <!--JavaScript Plugin-->
  <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>

  @include("inc.footer")