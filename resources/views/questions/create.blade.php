@extends('layouts.main')

@section('title', 'Solucione sua dúvida sobre programação! - Help Dev')

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-9">
		@if ($errors->any())
		<div class="alert alert-danger">
			<div class="d-flex justify-content-between">
				<ul class="nav flex-column">
					@foreach ($errors->all() as $error)
					<li class="nav-item">{{ $error }}</p>
						@endforeach
				</ul>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
		@endif
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-lg-10">
		<div class="row">
			<div class="col-lg-9">
				<div class="mb-5">
					<h1>Solucione sua dúvida sobre programação!</h1>
					<p class="lead">Logo logo você receberá propostas de pessoas qualificadas para te
						ajudar e acabar com sua dúvida.</p>
				</div>
				<create-question></create-question>
			</div>
			<div class="col">
				<div class="card mt-5 mt-md-0 mb-3 sticky-top sticky-top-navbar-height">
					<h5 class="card-header text-white bg-success">É grátis pedir ajuda, tente hoje!</h5>
					<div class="card-body">
						<p class="small">
							Tenha propostas de programadores habilitados em minutos.
						</p>
						<p class="small">Veja o perfil dos dev's e feedbacks, então fale com eles
							instantaneamente!
						</p>
						<p class="small">Seu ajudante favorito pode começar a trabalhar para você hoje</p>
						<p class="small">Pague o programador somente quando você estiver 100% satisfeito.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
