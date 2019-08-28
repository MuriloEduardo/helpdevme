<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NPNFJ97');
	</script>
	<!-- End Google Tag Manager -->

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- User ID -->
	<meta name="user-id" content="{{ Auth::id() }}">

	<title>{{ config('app.name', 'Help Dev') }} - Compartilhando Conhecimento</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-light">

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NPNFJ97" height="0" width="0"
			style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div id="app">
		<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top shadow-sm">
			<div class="container-fluid">
				<a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}">
					@svg('logo-helpdev')
					<span class="ml-2">{{ config('app.name', 'HelpDev.me') }}</span>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="@lang('layouts.navbar.toggle_navigation')">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav text-center">
						<li class="nav-item">
							<a class="nav-link"
								href="{{ route('questions.index') }}">@lang('layouts.navbar.questions')</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('users.index') }}">@lang('layouts.navbar.users')</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('tags.index') }}">@lang('layouts.navbar.tags')</a>
						</li>
					</ul>
					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto text-center">
						<!-- Authentication Links -->
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">@lang('layouts.navbar.login')</a>
						</li>
						<li class="nav-item">
							@if (Route::has('register'))
							<a class="btn text-white btn-success shadow px-5 my-1 mx-3"
								href="{{ route('register') }}">@lang('layouts.navbar.register')</a>
							@endif
						</li>
						@else
						<li class="nav-item">
							<b-button @click="$bvModal.show('modal-create-question')" variant="link"
								class="btn text-white btn-success px-5 my-1 mx-3">Pedir Ajuda</b-button>
						</li>
						<notifications></notifications>
						<li class="nav-item dropdown">
							<a id="navbarDropdown"
								class="nav-link dropdown-toggle d-flex flex-md-row-reverse justify-content-center align-items-center"
								title="Minha Conta" href="#" role="button" v-b-tooltip.hover data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								@include('shared.avatar', ['user' => auth()->user(), 'icon_class' => 'fa-2x'])
								<span class="pr-md-2 pr-0 pl-2 pl-md-0">Olá,
									{{ strtok(Auth::user()->name, ' ') }}!</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

								<a class="dropdown-item" href="{{ route('profile.infos') }}">
									@lang('layouts.navbar.profile')
								</a>

								<a class="dropdown-item" href="{{ route('finances.index') }}">
									@lang('layouts.navbar.finances')
								</a>

								<div class="dropdown-divider"></div>

								<small class="px-4 text-muted">Minhas Atividades</small>

								<a class="dropdown-item" href="{{ route('activities.client') }}">Como Cliente</a>
								<a class="dropdown-item" href="{{ route('activities.freelancer') }}">Como Freelancer</a>

								<div class="dropdown-divider"></div>

								<a class="dropdown-item text-muted" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
									@lang('layouts.navbar.logout')
								</a>

								<form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
									@csrf
								</form>
							</div>
						</li>
						<list-chat></list-chat>
						@endguest
					</ul>
				</div>
			</div>
		</nav>
		<main role="main">
			<section>
				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<div class="row">
								<header class="header-site mb-5 p-5 bg-success shadow-sm">
									<div class="row">
										<div class="col-lg-8 text-white">
											<h1 class="display-4 pb-3">Help Dev - Compartilhando Conhecimento</h1>
											<p class="lead py-3">Quantas vezes n&oacute;s Dev's ficamos desesperados
												atr&aacute;s de uma
												solu&ccedil;&atilde;o para uma d&uacute;vida?</p>
											<div class="row">
												<div class="col-lg-3">
													<b-button @click="$bvModal.show('modal-create-question')"
														variant="link" class="btn btn-light btn-block my-1 shadow">Pedir
														Ajuda</b-button>
												</div>
												<div class="col-lg-4">
													<a class="btn btn-primary btn-block my-1 shadow"
														href="{{ route('questions.index') }}">Ajude
														Alguém!</a>
												</div>
											</div>
										</div>
										<div class="col">
											@svg('paragliding')
										</div>
									</div>
								</header>
							</div>
							<div class="row">
								<div class="col-lg-10 offset-1">
									<article>
										<div class="row">
											<div class="col-lg-6 py-4">No stackoverflow n&atilde;o encontramos algo
												espec&iacute;fico e para fazer a
												nossa pr&oacute;pria pergunta &eacute; meio que "burocratico" e demora
												muito para se ter uma
												resposta.
											</div>
										</div>
										<div class="row flex-row-reverse">
											<div class="col-lg-6 py-4">Nos grupos de programa&ccedil;&atilde;o do
												Facebook os Dev's tem suas tarefas
												do
												dia-a-dia, n&atilde;o podem dedicar-se totalmente a quem est&aacute;
												atr&aacute;s de uma
												solu&ccedil;&atilde;o para seu c&oacute;digo.</div>
										</div>
										<div class="row">
											<div class="col-lg-6 py-4">Com esta necessidade n&oacute;s desenvolvemos uma
												plataforma para unir
												programadores que est&atilde;o precisando de socorro e outros que querem
												ganhar uma grana extra por
												fazerem o que gostam.</div>
										</div>
										<div class="row flex-row-reverse">
											<div class="col-lg-6 py-4">Funciona assim: ao ter uma d&uacute;vida que
												voc&ecirc; n&atilde;o encontra
												solu&ccedil;&atilde;o em lugar nenhum, corra para o AskDev e publique
												sua pergunta, juntamente com
												um
												pequeno valor que voc&ecirc; est&aacute; disposto a pagar pela
												solu&ccedil;&atilde;o dessa
												pergunta(m&iacute;nimo de R$0,50).</div>
										</div>
										<div class="row">
											<div class="col-lg-6 py-4">Programadores ver&atilde;o sua pergunta e aqueles
												que se julgarem aptos a lhe
												a
												ajudar, o far&atilde;o uma proposta com base no valor que voc&ecirc;
												estipulou.</div>
										</div>
										<div class="row flex-row-reverse">
											<div class="col-lg-6 py-4">Ent&atilde;o voc&ecirc; analisa as propostas,
												escolhe uma, efetua o pagamento
												via
												boleto ou cart&atilde;o de cr&eacute;dito(tudo feito pelo MercadoPago),
												e voc&ecirc;s j&aacute;
												podem
												come&ccedil;ar a trabalhar para solucionar a d&uacute;vida. Ter&aacute;
												espa&ccedil;o subir seu
												trecho
												de c&oacute;digo, o projeto todo, integra&ccedil;&atilde;o com GitHub,
												Plunker e etc&hellip;</div>
										</div>
										<div class="row">
											<div class="col-lg-6 py-4">O dinheiro s&oacute; ser&aacute; liberado a quem
												est&aacute; ajudando, quando
												o
												ajudado informar que sua d&uacute;vida foi solucionada de fato.</div>
										</div>
										<div class="row flex-row-reverse">
											<div class="col-lg-6 py-4">Seu dinheiro ficar&aacute; em seguran&ccedil;a,
												quando acionados n&oacute;s
												arbitramos e tentamos chegar a um acordo.</div>
										</div>
										<div class="row">
											<div class="col-lg-6 py-4">E o mais legal &eacute; que voc&ecirc; pode ser
												um ajudante ou um ajudado,
												ajude
												outros programadores em apuros e fique com saldo positivo em sua conta,
												use esse saldo para
												solucionar
												futuras d&uacute;vidas ou saque o valor.</div>
										</div>
									</article>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<footer>
			<div class="container">
				<div class="d-flex w-100 border-top py-3 justify-content-center align-items-center">
					@svg('logo-secondary-helpdev')
					<span class="ml-3">© 2019 Help Dev</span>
				</div>
			</div>
		</footer>
		<create-question :user="{{ auth()->check() ? auth()->user() : '{}' }}"></create-question>
	</div>
</body>

</html>
