@extends('layouts.app')

@section('title', $user->name . ' - ')

@section('content')
<div class="d-flex align-items-center users-show-user">
	@include('shared.avatar', ['user' => $user])
	<div class="px-3">
		<h1 class="display-4">{{ $user->name }}</h1>
		<p class="lead">{{ $user->email }}</p>
	</div>
</div>
<div class="row">
	<div class="col">
		<h2 class="my-5">{{ $user->questions->count() }} atividade(s) como cliente</h2>
		@foreach ($user->questions as $question)
		<div class="card card-body">
			<a href="#">
				<h5 class="mb-4">
					{{ $question->title }}
				</h5>
			</a>
			<p>{{ $question->body }}</p>
			<div class="d-flex justify-content-between py-3">
				<small>{{ $question->comments->count() }} respostas</small>
				<small>{{ $question->published }}</small>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
