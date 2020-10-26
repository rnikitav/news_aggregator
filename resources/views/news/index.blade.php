<div>
    <p>Список категорий</p>
    @foreach($news as $n)
        <p><a href="{{ route('news.category.show' , ['categoryid' => $n['id']]) }}">{{$n['name']}}</a></p>
    @endforeach
</div>
