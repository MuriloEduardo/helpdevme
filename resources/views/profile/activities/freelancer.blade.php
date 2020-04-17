@extends('layouts.main')

@section('title', 'Minhas Atividades como Freelancer - ')

@section('content')
<div class="row">
	<div class="col-lg-2">
		@include('profile.navigation')
	</div>
	<div class="col-lg">
		<h1 class="font-weight-light my-5">
			{{ $talks->count() . ' ' . str_plural('ajuda', $talks->count()) . ' ' . str_plural('prestada', $talks->count()) }}
		</h1>

		@foreach($talks as $talk)

		@php ($question = $talk->question)

		@include('shared.questions.item', ['question' => $question])
		@endforeach
	</div>
</div>
@endsection
