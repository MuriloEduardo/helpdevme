@extends('layouts.main')

@section('title', 'Minhas Atividades como Cliente - ')

@section('content')
<div class="row">
	<div class="col-lg-2">
		@include('profile.navigation')
	</div>
	<div class="col-lg">
		<h1 class="font-weight-light my-5">{{ $questions->count() . ' ' . str_plural('pedido', $questions->count()) }}
			de
			socorro</h1>

		@foreach($questions as $question)
		@include('shared.questions.item', ['question' => $question])
		@endforeach
	</div>
</div>
@endsection
