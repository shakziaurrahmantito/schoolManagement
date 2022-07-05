<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Demo</title>
	</head>
	<body>
		<ul>
			@foreach($paginate as $data)
				<li>{{$data->tea_name}}</li>
			@endforeach
		</ul>

		{{$paginate->links()}}
		
	</body>
</html>