@extends('layouts.main')

@section('title', 'Dashboard - Help Dev')

@section('content')
<a class="btn btn-lg btn-success mb-5" href="{{ route('questions.create') }}">Pedir Ajuda</a>
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
@auth
<div class="row mb-5">
	<!-- Complete seu perfil -->
	<div class="col">
		<div class="card card-body">
			<h2>Complete seu perfil</h2>
			<div class="my-3">
				<span class="display-4 text-success">{{ $percent }}%</span>
				<div class="progress">
					<div class="progress-bar bg-success" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			<ul class="mt-3 nav flex-column">
				<li class="nav-item">
					<a href="{{ route('profile.infos') }}" class="nav-link">
						<div class="d-flex align-items-center justify-content-between">
							<span>Verficiar email</span>
							<i title="{{ auth()->user()->email_verified_at ? 'Verificado' : 'Não verificado' }}" v-b-tooltip.hover aria-haspopup="true" class="fas fa-check-circle {{ auth()->user()->email_verified_at ? 'text-success' : 'text-secondary' }}"></i>
						</div>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('profile.infos') }}" class="nav-link">
						<div class="d-flex align-items-center justify-content-between">
							<span>Selecione suas linguagens de programação</span>
							<i title="{{ auth()->user()->tags->count() ? 'Selecionado' : 'Não selecionado' }}" v-b-tooltip.hover aria-haspopup="true" class="fas fa-check-circle {{ auth()->user()->tags->count() ? 'text-success' : 'text-secondary' }}"></i>
						</div>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('profile.infos') }}" class="nav-link">
						<div class="d-flex align-items-center justify-content-between">
							<span>Adicione sua foto de perfil</span>
							<i title="{{ auth()->user()->avatar ? 'Adicionado' : 'Não adicionado' }}" v-b-tooltip.hover aria-haspopup="true" class="fas fa-check-circle {{ auth()->user()->avatar ? 'text-success' : 'text-secondary' }}"></i>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
	@foreach (Auth::user()->notifications as $notification)
		@if($notification->type == 'App\Notifications\CreditsAdded')
		<!-- Parabéns, você recebeu R$5,00 -->
		<div id="gift-5-moneys" class="col-lg-3">
			<div class="card card-body bg-success text-white">
					<i class="fas fa-gifts fa-6x"></i>
					<span class="h3">{{ $notification->data['message'] }}</span>
			</div>
		</div>
		@endif
	@endforeach
</div>
@endauth
@endsection
