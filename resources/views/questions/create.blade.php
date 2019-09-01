@extends('layouts.main')

@section('title', 'Solucione sua dúvida sobre programação! - Help Dev')

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-9">
		<div class="mb-5">
			<h1>Solucione sua dúvida sobre programação!</h1>
			<p class="lead">Faça seu pedido de ajuda, fique por dentro das perguntas e tag's que mais estão bombando
				no momento.</p>
		</div>
		<create-question :user="{{ auth()->check() ? auth()->user() : '{}' }}"></create-question>
	</div>
</div>
@endsection
