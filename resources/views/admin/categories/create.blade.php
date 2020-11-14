@extends('layouts.app')
@section('content')


    <div class="col-8 offset-2">
        @if(session()->has('success'))
            <div class="alert alert-success">Категория добавлена</div>
        @elseif(session()->has('fail'))
            <div class="alert alert-danger">Категория не добавлена</div>
        @endif
        <h3>Добавление Категории</h3>
        <br>
        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            <p>Заголовок: <br><input class="form-control" name="name" value="{{ old('name') }}" ></p>
            @error('name') <div class="alert alert-danger">
                @foreach($errors->get('name') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
                <br>
            <button class="btn btn-success" type="submit">Добавить</button>
        </form>
    </div>
@stop
