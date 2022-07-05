<div>
    <h1>Welcome to header component {{$name}}</h1>


    <ul>
        @foreach($color as $data)
        <li>{{$data}}</li>
        @endforeach
    </ul>
</div>