@extends('layouts.app')

@section('title', 'Minhas Atividades como Cliente - ')

@section('content')

<div class="row py-5">
	<div class="col-lg-10 offset-lg-1">

		<ul class="nav nav-pills mb-5">
			<li class="nav-item">
				<a class="nav-link active" href="{{ route('activities.client') }}">Cliente</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('activities.freelancer') }}">Freelancer</a>
			</li>
		</ul>

		<h1 class="display-4 my-5">Minhas Atividades como Cliente</h1>

		@foreach($questions as $question)
		@include('shared.questions.item', ['question' => $question])
		@endforeach
	</div>
</div>
@endsection
