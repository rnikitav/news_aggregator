@extends('layouts.app')
@section('content')


    <div class="col-8 offset-2">
        @if(session()->has('success'))
            <div class="alert alert-success">Новость добавлена</div>
        @elseif(session()->has('fail'))
            <div class="alert alert-danger">Новость не добавлена</div>
        @endif
        <h3>Добавление новостей через Parser по URL</h3>
        <br>
        <form method="post" action="{{ route('parser.store') }}">
            @csrf
            <p>URL для загрузки новостей: <br><input class="form-control" name="url" value="{{ old('url') }}" >
            @error('url') <div class="alert alert-danger">
                @foreach($errors->get('url') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <br>
            <button class="btn btn-success" type="submit">Добавить</button>
            <h3>Проверенные ссылки</h3>
            <br>
            <p>https://news.yandex.ru/business.rss</p>
            <p>https://lenta.ru/rss/</p>
            <p>http://rss.cnn.com/rss/edition_world.rss</p>
            <p>https://www.cbr-xml-daily.ru/daily_utf8.xml</p>
        </form>
    </div>
@stop
