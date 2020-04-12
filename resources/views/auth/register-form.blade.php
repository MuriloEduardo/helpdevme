<form method="POST" action="{{ route('register') }}">
	@csrf

	<div class="form-group">
		<label for="name">{{ __('Name') }}</label>

		<div>
			<input
				id="name"
				type="text"
				class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
				name="name"
				value="{{ old('name') }}"
				required
				autofocus
			/>

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
			<input
				id="email"
				type="email"
				class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
				name="email"
				value="{{ old('email') }}"
				required
			/>

			@if ($errors->has('email'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group">
		<label>Linguagens de programação que domina</label>
		<select-tags></select-tags>
	</div>

	<div class="form-group">
		<label for="password">{{ __('Password') }}</label>

		<div>
			<input
				id="password"
				type="password"
				class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
				name="password"
				required
			/>

			@if ($errors->has('password'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col col-md-4">
			<button type="submit" class="btn btn-primary btn-block">
				@lang('layouts.navbar.register')
			</button>
		</div>
	</div>
</form>
