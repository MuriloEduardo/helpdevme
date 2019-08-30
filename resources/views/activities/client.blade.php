@extends('layouts.main')

@section('title', 'Minhas Atividades como Cliente - ')

@section('content')
<div class="row">
	<div class="col-lg-10 offset-lg-1">

		<ul class="nav nav-pills mb-5">
			<li class="nav-item">
				<a class="nav-link active" href="{{ route('activities.client') }}">Ajudado</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('activities.freelancer') }}">Ajudante</a>
			</li>
		</ul>

		<h1 class="font-weight-light my-5">{{ $questions->count() . ' ' . str_plural('pedido', $questions->count()) }}
			de
			socorro</h1>

		@foreach($questions as $question)
		@include('shared.questions.item', ['question' => $question])
		@endforeach
	</div>
</div>
@endsection
