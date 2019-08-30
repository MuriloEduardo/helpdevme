@extends('layouts.public')

@section('title', 'Recuperar Senha - ')

@section('content')
<div class="container-fluid">
	<div class="py-5">
		<h1 class="display-4 text-center mb-5">Recuperar Senha</h1>
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
						@endif

						<form method="POST" action="{{ route('password.email') }}">
							@csrf

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

							<div class="form-group mb-0">
								<button type="submit" class="btn btn-primary">
									{{ __('Send Password Reset Link') }}
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
