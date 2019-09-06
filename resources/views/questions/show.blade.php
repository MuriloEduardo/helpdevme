@extends('layouts.main')

@section('title', $question->title . ' - Help Dev')

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-10">
		<article>
			<header class="row mb-4">
				<div class="col flex-grow-0">
					<votes-question :question_id="{{ $question->id }}">
					</votes-question>
					<div class="p-1 mt-2 d-flex flex-column align-items-center">
						<span>{{ $question->views->count() }}</span>
						<small>Visualizaç{{ $question->views->count() == 1 ? 'ão' : 'ões' }}</small>
					</div>
				</div>
				<div class="col">
					<h1 class="font-weight-light m-0">{{ $question->title }}</h1>
				</div>
			</header>
			@include('shared.questions.status', ['status' => $question->status])
			<p class="lead">{!! $question->body !!}</p>
			<div class="row">
				<div class="col text-right">
					<div class="small mb-3">
						<span>{{ $question->published }} por</span>
						<a href="{{ route('users.show', $question->user) }}">{{ $question->user->name }}</a>
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col">
					@foreach($question->tags as $tag)
					<a href="{{ route('tags.show', $tag) }}" class="badge badge-primary">{{ $tag->title }}</a>
					@endforeach
				</div>
			</div>
			<c-comments :question_id="{{ $question->id }}"></c-comments>
		</article>
	</div>
</div>
@endsection
