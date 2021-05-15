@extends('layouts.app')
@section('content')
    <div class="col-12 offset-2">
        @if(session()->has('success'))
            <div class="alert alert-success">Юзер добавлен</div>
        @elseif(session()->has('fail'))
            <div class="alert alert-danger">Юзер не добавлен</div>
        @endif
        <a href="{{ route('users.create') }}" class="btn btn-success">Добавить юзера</a>
        @forelse($users as $user)
            <h4><a href="{{ route('users.edit', ['user' => $user]) }}">{{ $user->firstname }}</a></h4> -
                {{ $user->created_at->format('Y d-m (H:i)') }}
        @empty
            <h3>Пользователей нет</h3>
        @endforelse

        <br>
        {{ $users->links() }}
    </div>
@stop

