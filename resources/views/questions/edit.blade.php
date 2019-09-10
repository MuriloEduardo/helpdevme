@extends('layouts.main')

@section('title', 'Editar Pergunta - Help Dev')

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-10">
		<header class="mb-5">
			<h1>Editar Pergunta</h1>
			<p class="lead">Você só poderá editar perguntas que ainda não aceitou nenhuma proposta.</p>
		</header>
		<edit-question :question="{{ $question }}"></edit-question>
	</div>
</div>
@endsection
