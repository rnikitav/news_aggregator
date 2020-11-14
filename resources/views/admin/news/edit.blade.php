@extends('layouts.app')
@section('content')


    <div class="col-8 offset-2">



        <h3>Редактировать новость с #ID = {{ $news->id }}</h3>
        <br>
        <form method="post" action="{{ route('news.update', ['news' => $news]) }}">
            @method('PUT')
            @csrf
            <p>Ид Категории: <br><input class="form-control" name="idCategory" value="{{ $news->idCategory }}" >
            @error('idCategory') <div class="alert alert-danger">
                @foreach($errors->get('idCategory') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Ид Ресурса: <br><input class="form-control" name="source_id" value="{{ $news->source_id }}" >
            @error('source_id') <div class="alert alert-danger">
                @foreach($errors->get('source_id') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Заголовок: <br><input class="form-control" name="title" value="{{ $news->title }}" >
            @error('title') <div class="alert alert-danger">
                @foreach($errors->get('title') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Короткое описание: <br><input class="form-control" name="desc" value="{{$news->desc}}" >
            @error('desc') <div class="alert alert-danger">
                @foreach($errors->get('desc') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Картинка: <br><input class="form-control" name="img" value="{{ $news->img }}" >
            @error('img') <div class="alert alert-danger">
                @foreach($errors->get('img') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Описание: <br><textarea class="form-control" name="body">{{$news->body}}</textarea></p>
            @error('body') <div class="alert alert-danger">
                @foreach($errors->get('body') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Приватность новости: <br><input class="form-control" name="is_private" value="{{(int)$news->is_private}}" ></p>
            @error('is_private') <div class="alert alert-danger">
                @foreach($errors->get('is_private') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <button class="btn btn-success" type="submit">Редактировать</button>
        </form>
    </div>
@stop
