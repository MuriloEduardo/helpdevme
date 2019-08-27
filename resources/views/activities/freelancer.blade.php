@extends('layouts.app')

@section('title', 'Minhas Atividades como Freelancer - ')

@section('content')
<div class="row py-5">
	<div class="col-lg-10 offset-lg-1">
		<ul class="nav nav-pills mb-5">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('activities.client') }}">Ajudado</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="{{ route('activities.freelancer') }}">Ajudante</a>
			</li>
		</ul>

		<h1 class="font-weight-light my-5">{{ $talks->count() . ' ' . str_plural('ajuda', $talks->count()) }}</h1>

		@foreach($talks as $talk)

		@php ($question = $talk->question)

		@include('shared.questions.item', ['question' => $question])
		@endforeach
	</div>
</div>
@endsection
