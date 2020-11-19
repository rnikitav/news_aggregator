@extends('layouts.app')
@section('content')


    <div class="col-8 offset-2">


        <h3>Редактировать права пользователя с #ID = {{ $user->id }}</h3>
        <p>Имя : <b>{{$user->firstname}}</b></p>
        <p>Фамилия : <b>{{$user->lastname}}</b></p>
        <p>Email : <b>{{$user->email}}</b></p>
        <p>Email Verifired : <b>{{$user->email_verified_at}}</b></p>
        @if($user->is_admin)
            <h6> <b>Юзер администратор</b></h6>
        @else
            <h6> <b>Не администратор</b></h6>
        @endif
        <p>Изменить права</p>
        <form method="post" action="{{route('users.update', ['user' => $user])}}">
            @method('PUT')
            @csrf
            <label style="font-size: 20px">Админ
                <input name="is_admin" type="radio" value="1" @if($user->is_admin === true) checked @endif>
            </label>
            <br>
            <br>
            <label style="font-size: 20px">Обычный
                <input name="is_admin" type="radio" value="0" @if($user->is_admin === false) checked @endif>
            </label>
            @error('is_admin') <div class="alert alert-danger">
                @foreach($errors->get('is_admin') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <br>
            <button class="btn btn-success" type="submit">Редактировать</button>
        </form>
    </div>
@stop
