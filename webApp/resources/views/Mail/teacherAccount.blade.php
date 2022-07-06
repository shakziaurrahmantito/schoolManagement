<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>

  	<div class="row">
  		<div class="col-12">
	  		<div class="card">
			  <div class="card-body">
			  	<h5>Dear {{$data['name']}}</h5>
			  	<p>
			  		Thank you! {{$data['name']}}. You have opened an account from our school management system. <br> Below is your login information.
			  	</p>
			  	<ul>
			  		<li>Site Link: <a href="{{$data['sitelink']}}">{{$data['sitelink']}}</a></li>
			  		<li>Email: {{$data['email']}}</li>
			  		<li>Password: {{$data['password']}}</li>
			  	</ul>

			  	<p align="center">
			  		<a href="{{$data['sitelink']}}" target="_blank" style="
    		display: inline-block;
		    font-weight: 400;
		    text-align: center;
		    white-space: nowrap;
		    vertical-align: middle;
		    user-select: none;
		    border: 1px solid transparent;
		    padding: 0.375rem 0.75rem;
		    font-size: 1rem;
		    line-height: 1.5;
		    border-radius: 0.25rem;
		    text-decoration: none;
    		transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
			color: #fff;background-color: #007bff;border-color: #007bff;">Go to login</a>
			  	</p>
			  </div>
			  <div class="card-footer">
			  	<address>
			  		<p>
			  			Regards: <br>
			  			Name: Md. Ziaur Rahman <br>
			  			Contact: 01798659666 <br>
			  			Email: shakziaurrahmantito@gmail.com<br>
			  			Address: House #100, Delua, Saturia, Manikganj. <br>
			  		</p>
			  		
			  	</address>
			  </div>
			</div>
  		</div>
  	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>