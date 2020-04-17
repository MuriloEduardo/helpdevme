@extends('layouts.public')

@section('title', 'Verificação de Senha - Help Dev')

@section('content')
<div class="container">
	<div class="py-5">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						@if (session('resent'))
						<div class="alert alert-success" role="alert">
							{{ __('A fresh verification link has been sent to your email address.') }}
						</div>
						@endif

						<p>Antes de prosseguir, verifique seu e-mail para um link de verificação.</p>
						<p>Se você não recebeu o email, <a class="text-success" href="{{ route('verification.resend') }}">clique aqui</a> para solicitar outro.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
