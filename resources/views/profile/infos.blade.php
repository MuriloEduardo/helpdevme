@php ($user = auth()->user())

@extends('layouts.main')

@section('title', 'Informações Pessoais - Help Dev')

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-2">
		@include('profile.navigation')
	</div>
	<div class="col-lg">
		@if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div>
		@endif

		@foreach ($errors->all() as $error)
		<div class="alert alert-danger">
			{{ $error }}
		</div>
		@endforeach

		<h2 class="display-4 mb-5">Informações Pessoais</h2>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
							@csrf
							@method('PATCH')
							<div class="form-group row align-items-center">
								<label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
								<div class="col-md-6">
									<profile-preview-avatar :user="{{ $user }}"></profile-preview-avatar>
								</div>
							</div>
							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
								<div class="col-md-6">
									<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required>

									@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Linguagens de programação</label>
								<div class="col-md-6">
									<select-tags :list="{{ auth()->user()->tags }}"></select-tags>
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">
									Email
									<i title="{{ $user->email_verified_at ? 'Email verificado' : 'Email não verificado' }}" v-b-tooltip.hover aria-haspopup="true" class="fas fa-check-circle {{ $user->email_verified_at ? 'text-success' : 'text-secondary' }}"></i>
								</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

									@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
									@endif

									@if (!$user->email_verified_at)
									<a class="btn btn-link btn-sm" href="{{ route('profile.sendEmailVerificationNotification') }}">Reenviar email de verificação</a>
									@endif
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">
										{{ __('Salvar') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
