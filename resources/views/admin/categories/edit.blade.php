@extends('layouts.app')
@section('content')


    <div class="col-8 offset-2">


        <h3>Редактировать категорию с #ID = {{ $category->id }}</h3>
        <br>
        <form method="post" action="{{ route('categories.update', ['category' => $category]) }}">
            @method('PUT')
            @csrf
            <p>Заголовок: <br><input class="form-control" name="name" value="{{ $category->name }}" ></p>
            @error('name') <div class="alert alert-danger">
                @foreach($errors->get('name') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
                <br>
            <button class="btn btn-success" type="submit">Редактировать</button>
        </form>
    </div>
@stop
