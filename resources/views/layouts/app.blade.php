<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>

	@if(env('APP_ENV') != 'local')
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
	@endif

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- User ID -->
	<meta name="user-id" content="{{ Auth::id() }}">

	<meta name="google-site-verification" content="j4hiGSNESeVRy3lUqig5WHNGsa4DWGNLz5nkh2clCcg" />

	<title>@yield('title')</title>

	<meta name="description" content="@yield('description')">
	<meta name="keywords" content="@yield('keywords')">

	<!-- Styles -->
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-light h-100">

	@if(env('APP_ENV') != 'local')
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NPNFJ97" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	@endif

	<div id="app">
		<nav class="navbar navbar-expand-md navbar-white bg-white fixed-top shadow-sm">
			<div class="container-fluid">
				<a class="navbar-brand d-flex align-items-center" href="{{ auth()->check() ? route('dashboard') : route('index') }}">
					@svg('logo-helpdev')
					<span class="ml-2">{{ config('app.name', 'HelpDev.me') }}</span>
				</a>
				<button class="navbar-toggler btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('layouts.navbar.toggle_navigation')">
					<i class="fas fa-bars"></i>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav text-center">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('questions.index') }}">@lang('layouts.navbar.questions')</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('users.index') }}">@lang('layouts.navbar.users')</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('tags.index') }}">@lang('layouts.navbar.tags')</a>
						</li>
					</ul>
					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto text-center align-items-center">
						<!-- Authentication Links -->
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">@lang('layouts.navbar.login')</a>
						</li>
						<li class="nav-item">
							@if (Route::has('register'))
							<a class="{{ Auth::check() ? 'nav-link' : 'btn text-white btn-success' }}" href="{{ route('register') }}">@lang('layouts.navbar.register')</a>
							@endif
						</li>
						@else
						<li class="nav-item">
							<div class="h4 m-0">
								<a href="{{ route('finances.index') }}" class="nav-link badge badge-pill badge-success text-white" title="Finanças" v-b-tooltip.hover aria-haspopup="true">
									@include('shared.budget', ['budget' => auth()->user()->amount])
								</a>
							</div>
						</li>
						<notifications></notifications>
						<list-item></list-item>
						<li class="nav-item">
							<a class="nav-link d-flex flex-md-row-reverse justify-content-center align-items-center" title="Minha Conta" href="{{ route('profile.infos') }}" v-b-tooltip.hover aria-haspopup="true">
								@include('shared.avatar', ['user' => auth()->user(), 'icon_class' => 'fa-2x'])
								<span class="pr-md-2 pr-0 pl-2 pl-md-0">{{ strtok(Auth::user()->name, ' ') }}</span>
							</a>
						</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>
		<main role="main">
			@yield('main')
		</main>
		<footer class="bg-dark">
			<div class="container">
				<div class="d-flex w-100 py-3 justify-content-center align-items-center">
					@svg('logo-secondary-helpdev')
					<span class="ml-3 text-white">© 2019 - 2020 Help Dev</span>
				</div>
			</div>
		</footer>
	</div>
</body>

<!-- Scripts -->
<script src="{{ mix('js/manifest.js') }}" defer></script>
<script src="{{ mix('js/vendor.js') }}" defer></script>
<script src="{{ mix('js/app.js') }}" defer></script>

</html>
