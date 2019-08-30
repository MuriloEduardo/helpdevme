@extends('layouts.main')

@section('title', 'Realizar Pagamento - ')

@section('content')
<div class="py-5">
	@if(session()->get('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>
	@endif
	<header>
		<h1 class="display-4">Depósito em garantia para</h1>
		<p class="lead">{{ $post->talk->question->title }}</p>
	</header>
	<div class="text-right my-5">
		<h5>Seu Saldo</h5>
		<div class="h1">
			@include('shared.budget', ['budget' => auth()->user()->amount])
		</div>
		@if (auth()->user()->amount < $post->budget)
			<a href="{{ route('finances.fund') }}" class="btn btn-primary">Adicionar Saldo</a>
			@endif
	</div>
	<div class="card">
		<div class="card-body">
			<div class="d-flex justify-content-between align-items-center">
				<h5>Total</h5>
				<h5 class="text-success">
					@include('shared.budget', ['budget' => $post->budget])
				</h5>
				<div>
					@if (auth()->user()->amount >= $post->budget)
					<form action="{{ route('payments.transfer') }}" method="POST">
						@csrf
						<input type="hidden" name="id" value="{{ $post->id }}">
						<button type="submit" class="btn btn-success">Pagar</button>
					</form>
					@else
					<span class="text-danger">Saldo Insuficiente</span>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
