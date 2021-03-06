@php ($user = auth()->user())

@extends('layouts.main')

@section('title', 'Senha - Help Dev')

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
		<h2 class="display-4 mb-5">Senha</h2>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
							@csrf
							@method('PATCH')

							<div class="form-group row">
								<label for="current_password" class="col-md-4 col-form-label text-md-right">Senha atual</label>
								<div class="col-md-6">
									<input id="current_password" type="password" class="form-control" name="current_password">
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Nova senha</label>
								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="password">
								</div>
							</div>

							<div class="form-group row">
								<label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirme nova senha</label>
								<div class="col-md-6">
									<input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
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
