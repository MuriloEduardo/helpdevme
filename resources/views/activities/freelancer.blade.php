@extends('layouts.app')

@section('title', 'Minhas Atividades como Freelancer - ')

@section('content')
<div class="row">
	<div class="col-lg-10 offset-lg-1">
		<ul class="nav nav-pills mb-5">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('activities.client') }}">Cliente</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="{{ route('activities.freelancer') }}">Freelancer</a>
			</li>
		</ul>

		<h1 class="display-4 my-5">Minhas Atividades como Freelancer</h1>

		@foreach($talks as $talk)

		@php ($question = $talk->question)

		@include('shared.questions.item', ['question' => $question])
		@endforeach
	</div>
</div>
@endsection
