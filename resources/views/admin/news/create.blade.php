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
            @error('idCategory') <div class="alert alert-danger">
                @foreach($errors->get('idCategory') as $error)
                    {{$error}}
            @endforeach
                </div>
            @enderror
            <p>Ид Ресурса: <br><input class="form-control" name="source_id" value="{{ old('source_id') }}" >
            @error('source_id') <div class="alert alert-danger">
                @foreach($errors->get('source_id') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Заголовок: <br><input class="form-control" name="title" value="{{ old('title') }}" >
            @error('title') <div class="alert alert-danger">
                @foreach($errors->get('title') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Короткое описание: <br><input class="form-control" name="desc" value="{{ old('desc') }}" ></p>
            @error('desc') <div class="alert alert-danger">
                @foreach($errors->get('desc') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Картинка: <br><input class="form-control" name="img" value="{{ old('img') }}" >
            @error('img') <div class="alert alert-danger">
                @foreach($errors->get('img') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Приватность новости: <br><input class="form-control" name="is_private" value="{{ old('is_private') }}" ></p>
            @error('is_private') <div class="alert alert-danger">
                @foreach($errors->get('is_private') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Описание: <br><textarea class="form-control" name="body">{!! old('body') !!}</textarea></p>
            @error('body') <div class="alert alert-danger">
                @foreach($errors->get('body') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <button class="btn btn-success" type="submit">Добавить</button>
        </form>
    </div>
@stop
