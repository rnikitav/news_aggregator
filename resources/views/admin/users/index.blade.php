@extends('layouts.app')
@section('content')
    <div class="col-12 offset-2">
        <a href="{{ url('/register') }}" class="btn btn-success">Добавить юзера</a>
        {{--        <a href="javascript:;" class="deleteData" rel="9">Drop</a>--}}
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

