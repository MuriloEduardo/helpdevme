@extends('layouts.main')

@section('title', 'Dashboard - Help Dev')

@section('content')
<div class="row">
	<div class="col">
		<div class="row justify-content-center">
			<div class="col-lg-9">
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
					<div class="col">
						<div class="bg-success text-white p-3">
							<h2>Parabéns! Você recebeu R$5,00 de saldo por se cadastrar!</h2>
						</div>
					</div>
					<div class="col">
						<h2>Saldo</h2>
						<h3>@include('shared.budget', ['budget' => auth()->user()->amount])</h3>
					</div>
					<div class="col">
						<h2>Complete seu perfil</h2>
						<ul>
							<li>Verficiar email</li>
							<li>Suas linguagens de programação</li>
							<li>Configure sua conta bancária e método de pagamento</li>
						</ul>
					</div>
				</div>
				@endauth
			</div>
		</div>
	</div>
</div>
@endsection
