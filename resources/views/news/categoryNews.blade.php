<h1>Список новостей категории</h1>
@foreach($news as $one)
<p><a href="{{ route('news.show' , ['categoryid' => $one['idCategory'] ,'id' => $one['id']]) }}">{{$one['title']}}</a></p>
@endforeach
