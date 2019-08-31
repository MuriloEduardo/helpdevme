<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

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

	<title>@yield('title')</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-light h-100">

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NPNFJ97" height="0" width="0"
			style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div id="app">
		<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top shadow-sm">
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
							<a class="btn text-white btn-success px-5 my-1 mx-3"
								href="{{ route('questions.create') }}">Pedir Ajuda</a>
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
			@yield('main')
		</main>
		<footer>
			<div class="container">
				<div class="d-flex w-100 border-top py-3 justify-content-center align-items-center">
					@svg('logo-secondary-helpdev')
					<span class="ml-3">© 2019 Help Dev</span>
				</div>
			</div>
		</footer>
	</div>
</body>

</html>
