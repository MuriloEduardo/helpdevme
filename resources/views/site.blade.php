@extends('layouts.public')

@php
$title = 'Se você é programador esse conteúdo é para você';
$description = 'Saca só, juntamos o útil ao agradável para acabar com as dúvidas que
nunca conseguimos achar solução prática e ficamos em sérios apuros. Juntamos isso
com uma recompensa por essas ajudas para os Dev\'s. Nada absurdo, e você estará
ajudando quem te ajuda...';
@endphp

@section('title', $title . ' - Help Dev')
@section('description', $description)
@section('keywords', 'programadores, dev\'s, desenvolvedores, developers, desenvolvimento, software, programador,
ajuda, stackoverflow, solução de bugs, bugs')

@section('main')
<section class="header-site p-5 bg-success shadow-sm">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 text-white">
				<h1 class="display-4 pb-3">{{ $title }}</h1>
				<p class="lead py3">{{ $description }}</p>
			</div>
			<div class="col">
				<form method="POST" class="bg-white p-5 shadow" action="{{ route('register') }}">
					@csrf

					<div class="form-group">
						<label for="email">{{ __('E-Mail Address') }}</label>

						<div>
							<input id="email" type="email"
								class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
								name="email" value="{{ old('email') }}" required>

							@if ($errors->has('email'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
					</div>

					<div class="row">
						<div class="col col-md-4">
							<button type="submit" class="btn btn-primary btn-block">
								{{ __('Register') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row flex-row-reverse py-5">
			<div class="col text-center">
				<article>
					<h2 class="pb-4">Juntando o útil ao agradável</h2>
					<p>Você só vai precisar publicar sua pergunta com um valor mínimo de R$2,50, não da
						nem pra
						chorar o preço de tão barato(e se você quiser recompensar por mais se for uma
						dúvida
						muito complicada de se resolver também pode). E logo logo você receberá
						propostas de
						pessoas qualificadas para te ajudar e acabar com sua dúvida.</p>
				</article>
			</div>
		</div>
	</div>
</section>
<section class="bg-success-opacity">
	<div class="container">
		<div class="row justify-content-center py-5">
			<div class="col text-center">
				<article>
					<h2 class="pb-4">Ajude e seja ajudado</h2>
					<p>Isso é mais que comercial, é social, é um vínculo para colegas de profissão(ou
						não) se
						ajudarem. Então para o Help Dev o novo App feito por desenvolvedores para
						desenvolvedores.</p>
				</article>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="text-center">
			<h2>Como funciona?</h2>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="text-center">
			<h2>Dúvidas</h2>
		</div>
	</div>
</section>
@endsection
