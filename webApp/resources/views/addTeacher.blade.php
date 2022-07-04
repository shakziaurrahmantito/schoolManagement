  @include("inc.header")
  @include("inc.sidebar")

  <div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">
          <h3>Add Teacher</h3>
          <hr>

          @if(Session::get('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif

          <form method="post" action="{{route('teacherInsert')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Name" required value="{{old('tea_name')}}" name="tea_name">
                @error("tea_name")
                  <small>{{$message}}</small>
                @enderror
              </div>
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Father's name" required value="{{old('tea_father')}}" name="tea_father">
                @error("tea_father")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Mother's name" value="{{old('tea_mother')}}" required name="tea_mother">
                @error("tea_mother")
                  <small>{{$message}}</small>
                @enderror
              </div>
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" placeholder="Email address" required value="{{old('tea_email')}}" name="tea_email">
                @error("tea_email")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div> 


            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="text" class="form-control" value="{{old('tea_phone')}}" placeholder="Phone" required name="tea_phone">
                @error("tea_phone")
                  <small>{{$message}}</small>
                @enderror
              </div>
              <div class="col-md-6 my-2">
                <input type="text" value="{{old('tea_nid')}}" class="form-control" placeholder="NID" required  name="tea_nid" >
                @error("tea_nid")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 my-2">
                <input type="text" class="form-control" value="{{old('tea_address')}}" placeholder="Address" required name="tea_address">
                @error("tea_address")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 my-2">
                <input type="password" class="form-control" value="{{old('tea_password')}}" placeholder="Password" required name="tea_password">
                @error("tea_password")
                  <small>{{$message}}</small>
                @enderror
              </div>
              <div class="col-md-6 my-2">
                <input type="password" class="form-control" value="{{old('tea_con_password')}}" placeholder="Confirm password" required name="tea_con_password">
                @error("tea_con_password")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 my-2">
                <select class="form-control"required name="tea_role">
                  <option value="">Select Role</option>@foreach($getRole as $data)
                    <option value="{{$data->role_id}}">{{$data->role_name}}</option>
                  @endforeach
                </select>
                @error("tea_role")
                  <small>{{$message}}</small>
                @enderror
              </div>

              <div class="col-md-6 my-2">
                <select class="form-control" required name="tea_cla">
                  <option value="">Select Class</option>
                  <option value="0">None</option>
                  @foreach($getCla as $data)
                    <option value="{{$data->cla_id}}">{{$data->cla_name}}</option>
                  @endforeach
                </select>
                @error("tea_cla")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 my-2">
                <input type="file" class="form-control-file" required name="tea_img">
                @error("tea_img")
                  <small>{{$message}}</small>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 my-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" required name="tea_status" id="unit_status" value="1">
                  <label class="form-check-label" for="unit_status">Active</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" required name="tea_status" id="unit_statu" value="0">
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


    





    
  

  </script>


  @include("inc.footer")