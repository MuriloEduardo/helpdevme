@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($users as $user)
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <img class="img-fluid rounded-circle" src="/storage/avatars/{{ $user->avatar }}" alt="{{ $user->name }}" title="{{ $user->name }}">
                            </div>
                            <div class="col">
                                <h5 class="card-title">
                                    <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                                </h5>
                                <p class="card-text">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection