@extends('layouts.app')
@section('content')


    <div class="col-8 offset-2">
        @if(session()->has('success'))
            <div class="alert alert-success">Новость добавлена</div>
        @elseif(session()->has('fail'))
            <div class="alert alert-danger">Новость не добавлена</div>
        @endif
        <h3>Добавление юзера</h3>
        <br>
        <form method="post" action="{{ route('users.store') }}">
            @csrf
            <p>Имя: <br><input class="form-control" name="firstname" value="{{ old('firstname') }}" >
            @error('firstname') <div class="alert alert-danger">
                @foreach($errors->get('firstname') as $error)
                    {{$error}}
            @endforeach
                </div>
            @enderror
            <p>Фамилия: <br><input class="form-control" name="lastname" value="{{ old('lastname') }}" >
            @error('lastname') <div class="alert alert-danger">
                @foreach($errors->get('lastname') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Email: <br><input class="form-control" name="email" value="{{ old('email') }}" >
            @error('email') <div class="alert alert-danger">
                @foreach($errors->get('email') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Пароль : <br><input class="form-control" name="password" value="{{ old('password') }}" ></p>
            @error('password') <div class="alert alert-danger">
                @foreach($errors->get('password') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Admin: (не обязательно)  <br><input class="form-control" name="is_admin" value="{{ (int)old('is_admin') }}" >
            @error('is_admin') <div class="alert alert-danger">
                @foreach($errors->get('is_admin') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Телефон: (не обязательно)  <br><input class="form-control" name="phone" value="{{ old('phone') }}" ></p>
            @error('phone') <div class="alert alert-danger">
                @foreach($errors->get('phone') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <label for="gender">Пол (не обязательно) </label><br>
            <?php
            $res = old('gender');
            ?>
            Муж <input id="gender" name="gender" type="radio" value="m" @if($res === 'm') checked @endif>
            Жен <input id="gender" name="gender" type="radio" value="f" @if($res === 'f') checked @endif>
            @error('gender') <div class="alert alert-danger">
                @foreach($errors->get('gender') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <br>
            <p>День рождения: (не обязательно)  <br><input type="date" name="birthday"
                                                            value="{{null}}" min="1900-01-01" max="{{date('Y-m-d')}}"></p>
            @error('birthday') <div class="alert alert-danger">
                @foreach($errors->get('birthday') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Родной город : (не обязательно) <br><textarea class="form-control" name="hometown">{!! old('hometown') !!}</textarea></p>
            @error('hometown') <div class="alert alert-danger">
                @foreach($errors->get('hometown') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <p>Фото : (не обязательно) <br><textarea class="form-control" name="photo">{!! old('photo') !!}</textarea></p>
            @error('photo') <div class="alert alert-danger">
                @foreach($errors->get('photo') as $error)
                    {{$error}}
                @endforeach
            </div>
            @enderror
            <button class="btn btn-success" type="submit">Добавить</button>
        </form>
    </div>
@stop
