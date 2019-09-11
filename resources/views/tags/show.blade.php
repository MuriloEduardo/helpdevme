@extends('layouts.main')

@section('title', $tag->title . ' - Help Dev')

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-10">
		<div class="d-flex align-items-center mb-3">
			<i class="{{ $tag->image }} colored fa-5x"></i>
			<h1 class="display-4 my-0 mx-3">{{ $tag->title }}</h1>
		</div>
		<p class="lead">Usada em {{ $tag->questions->count() . ' ' . str_plural('pergunta', $tag->questions->count()) }}
		</p>
		@foreach ($tag->questions as $question)
		@include('shared.questions.item', ['question' => $question])
		@endforeach
	</div>
</div>
@endsection
