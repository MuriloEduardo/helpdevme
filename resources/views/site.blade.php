@extends('layouts.public')

@php
$title = 'Se você é programador esse conteúdo é para você!';
$description = 'Saca só, juntamos o útil ao agradável para acabar com as dúvidas que
nunca conseguimos achar solução prática e ficamos em sérios apuros. Juntamos isso
com uma recompensa por essas ajudas para os Dev\'s. Nada absurdo, e você estará
ajudando quem te ajuda...';
@endphp

@section('title', $title)
@section('description', $description)
@section('keywords', 'programadores, dev\'s, desenvolvedores, developers, desenvolvimento, software, programador,
ajuda, stackoverflow, solução de bugs, bugs')

@section('main')
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="row">
					<header class="header-site mb-5 p-5 bg-success shadow-sm w-100">
						<div class="row">
							<div class="col-lg-8 text-white">
								<h1 class="display-4 pb-3">{{ $title }}</h1>
								<p class="lead py3">{{ $description }}</p>
								<div class="row">
									<div class="col-lg-5">
										<a class="btn btn-primary btn-block mt-5 mb-4 shadow"
											href="{{ route('questions.index') }}">Ajude outros
											programadores</a>
									</div>
								</div>
							</div>
							<div class="col">
								@svg('paragliding')
							</div>
						</div>
					</header>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="row flex-row-reverse py-5">
							<div class="col">
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
							<div class="col"></div>
						</div>
					</div>
				</div>
				<div class="row justify-content-center bg-success-opacity">
					<div class="col-lg-10">
						<div class="row py-5">
							<div class="col">
								<article>
									<h2 class="pb-4">Ajude e seja ajudado</h2>
									<p>Isso é mais que comercial, é social, é um vínculo para colegas de profissão(ou
										não) se
										ajudarem. Então para o Help Dev o novo App feito por desenvolvedores para
										desenvolvedores.</p>
								</article>
							</div>
							<div class="col"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
