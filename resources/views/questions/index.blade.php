@extends('layouts.main')

@section('title', $title . ' - Help Dev')

@section('content')
<div class="row">
	<div class="col">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul class="nav flex-column">
				@foreach ($errors->all() as $error)
				<li class="nav-item">{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div>
		@endif
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="row justify-content-center">
			<div class="col-lg-9">
				<div class="mb-5">
					<h1>{{ $title }}</h1>
					<p class="lead">Aqui abaixo ficarão os pedidos de ajuda de outros programadores</p>
				</div>
				<list-new-questions></list-new-questions>
				@forelse($questions as $question)
				@include('shared.questions.item', ['question' => $question])
				@empty
				<div class="d-flex flex-column align-items-center w-100">
					<span>Não existem perguntas cadastradas</span>
					<a class="mt-4 btn text-white btn-success px-5 my-1 mx-3"
						href="{{ route('questions.create') }}">Publicar Questão</a>
				</div>
				@endforelse
			</div>
		</div>
	</div>
</div>
@endsection
