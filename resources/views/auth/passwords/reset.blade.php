@extends('layouts.public')

@section('title', 'Resetar Senha - Help Dev')

@section('content')
<div class="container-fluid">
	<div class="py-5">
		<h1 class="display-4 text-center mb-5">Resetar Senha</h1>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-5">
					<div class="card">
						<div class="card-body">
							<form method="POST" action="{{ route('password.update') }}">
								@csrf

								<input type="hidden" name="token" value="{{ $token }}">

								<div class="form-group">
									<label for="email">{{ __('E-Mail Address') }}</label>

									<div>
										<input id="email" type="email"
											class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
											name="email" value="{{ $email ?? old('email') }}" required autofocus>

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

								<div>
									<button type="submit" class="btn btn-primary">
										{{ __('Reset Password') }}
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
