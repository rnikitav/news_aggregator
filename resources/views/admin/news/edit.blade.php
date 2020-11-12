@extends('layouts.app')
@section('content')


    <div class="col-8 offset-2">



        <h3>Редактировать новость с #ID = {{ $news->id }}</h3>
        <br>
        <form method="post" action="{{ route('news.update', ['news' => $news]) }}">
            @method('PUT')
            @csrf
            <p>Ид Категории: <br><input class="form-control" name="idCategory" value="{{ $news->idCategory }}" >
            <p>Ид Ресурса: <br><input class="form-control" name="source_id" value="{{ $news->source_id }}" >
            <p>Заголовок: <br><input class="form-control" name="title" value="{{ $news->title }}" >
            <p>Короткое описание: <br><input class="form-control" name="desc" value="{{$news->desc}}" >
            <p>Картинка: <br><input class="form-control" name="img" value="{{ $news->img }}" >
            <p>Описание: <br><textarea class="form-control" name="body">{{$news->body}}</textarea></p>
            @if($news->is_private)
                <p>Приватность новости: <br><input class="form-control" name="is_private" value="1" ></p>
            @else
                <p>Приватность новости: <br><input class="form-control" name="is_private" value="0" ></p>
            @endif
            <button class="btn btn-success" type="submit">Редактировать</button>
        </form>
    </div>
@stop
