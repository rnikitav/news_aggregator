@extends('layouts.app')
@section('content')


    <div class="col-8 offset-2">
        @if(session()->has('success'))
            <div class="alert alert-success">Новость добавлена</div>
        @elseif(session()->has('fail'))
            <div class="alert alert-danger">Новость не добавлена</div>
        @endif
        <h3>Добавление новости</h3>
        <br>
        <form method="post" action="{{ route('news.store') }}">
            @csrf
            <p>Ид Категории: <br><input class="form-control" name="idCategory" value="{{ old('idCategory') }}" >
            <p>Ид Ресурса: <br><input class="form-control" name="source_id" value="{{ old('source_id') }}" >
            <p>Заголовок: <br><input class="form-control" name="title" value="{{ old('title') }}" >
            <p>Короткое описание: <br><input class="form-control" name="desc" value="{{ old('desc') }}" >
{{--            @error('title') <div class="alert alert-danger">--}}
{{--                @foreach($errors->get('title') as $error)--}}
{{--                    {{ $error }}--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            @enderror--}}
            </p>
            <p>Картинка: <br><input class="form-control" name="img" value="{{ old('img') }}" >
            <p>Приватность новости: <br><input class="form-control" name="is_private" value="{{ old('is_private') }}" ></p>
{{--            @error('author') <div class="alert alert-danger">--}}
{{--                @foreach($errors->get('author') as $error)--}}
{{--                    {{ $error }}--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            @enderror--}}

            <p>Описание: <br><textarea class="form-control" name="body">{!! old('body') !!}</textarea></p>
            <button class="btn btn-success" type="submit">Добавить</button>
        </form>
    </div>
@stop
