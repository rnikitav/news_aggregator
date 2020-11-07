@foreach($news as $one)
    <h3>{{$one->title}}</h3>
    <p>{{$one->slug}}</p>
    <hr>
@endforeach
