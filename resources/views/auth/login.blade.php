@extends('layouts.public')

@section('title', 'Entrar - Help Dev')

@section('content')
<div class="container-fluid">
	<div class="py-5">
		<h1 class="display-4 text-center mb-5">@lang('layouts.navbar.login')</h1>
		<div class="row justify-content-center">
			<div class="col-11 col-lg-5 col-sm-7 col-xl-4">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="{{ route('login') }}">
							@csrf

							<div class="form-group">
								<label for="email">{{ __('E-Mail Address') }}</label>

								<div>
									<input id="email" type="email"
										class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
										name="email" value="{{ old('email') }}" required autofocus>

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
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember"
										{{ old('remember') ? 'checked' : '' }}>

									<label class="form-check-label" for="remember">
										{{ __('Remember Me') }}
									</label>
								</div>
							</div>

							<div class="row">
								<div class="col col-md-4">
									<button type="submit" class="btn btn-primary btn-block">
										{{ __('Login') }}
									</button>
								</div>
								<div class="col col-md-8">
									<a class="btn btn-link" href="{{ route('password.request') }}">
										{{ __('Forgot Your Password?') }}
									</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<a href="{{ route('register') }}" class="btn btn-link mt-3">Ainda não é cadastrado? Cadastre-se já!</a>
			</div>
		</div>
	</div>
</div>
@endsection
