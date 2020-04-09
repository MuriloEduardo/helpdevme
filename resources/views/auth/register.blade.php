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
						@include('auth.register-form')
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
