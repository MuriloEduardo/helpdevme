@extends('layouts.app')

@section('title', $tag->title . ' - ')

@section('content')
<div class="d-flex align-items-center mb-3">
	<i class="{{ $tag->image }} colored"></i>
	<h1 class="display-4 my-0 mx-3">{{ $tag->title }}</h1>
</div>
<p class="lead">Usada em {{ count($tag->questions) }} pergunta(s)</p>
<hr>
@foreach ($tag->questions as $question)
<div class="card my-4">
	<div class="card-body">
		<a href="{{ route('questions.show', $question) }}">
			<h2 class="h5 card-title">{{ $question->title }}</h2>
		</a>
		<div class="row card-text text-muted">
			<div class="col">
				<small>{{ count($question->comments) }} resposta(s)</small>
			</div>
			<div class="col text-right">
				<div class="small">
					<span>{{ $question->published }} por</span>
					<a href="{{ route('users.show', $question->user) }}">{{ $question->user->name }}</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection
