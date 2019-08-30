@extends('layouts.public')

@section('title', 'Registre-se - Help Dev')

@section('content')
<div class="container-fluid">
	<div class="py-5">
		<h1 class="display-4 text-center mb-5">@lang('layouts.navbar.register')</h1>
		<div class="row justify-content-center">
			<div class="col-11 col-lg-5 col-sm-7 col-xl-4">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="{{ route('register') }}">
							@csrf

							<div class="form-group">
								<label for="name">{{ __('Name') }}</label>

								<div>
									<input id="name" type="text"
										class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
										value="{{ old('name') }}" required autofocus>

									@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
									@endif
								</div>
							</div>

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

							<div class="form-group">
								<label for="password">{{ __('Password') }}</label>

								<div>
									<input id="password" type="password"
										class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
										name="password" required>

									@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<label for="password-confirm">{{ __('Confirm Password') }}</label>

								<div>
									<input id="password-confirm" type="password" class="form-control"
										name="password_confirmation" required>
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
		</div>
		<div class="row">
			<div class="col text-center">
				<a href="{{ route('login') }}" class="btn btn-link mt-3">Já é cadastrado? Faça o login!</a>
			</div>
		</div>
	</div>
</div>
@endsection
