@extends('layouts.main')

@section('title', 'Usuários - Help Dev')

@section('content')
<div class="row">
	<div class="col col-lg-10 offset-lg-1">
		<h1 class="display-4 mb-4">Usuários</h1>
		<div class="row">
			@forelse($users as $user)
			<div class="col-lg-4">
				<div class="card my-3 users-index-user">
					<div class="card-body">
						<div class="row">
							<div class="col flex-grow-0">
								@include('shared.avatar', ['user' => $user, 'icon_class' => 'fa-4x mb-4 m-lg-0'])
							</div>
							<div class="col">
								<h5 class="card-title">
									<a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
								</h5>
								<p class="card-text">{{ $user->email }}</p>
							</div>
						</div>
						<div class="mt-4">
							<h6 class="small text-muted">
								{{ $user->questions->count() . ' ' . str_plural('atividade', $user->questions->count()) }}
								como
								cliente</h6>
							<h6 class="small text-muted m-0">
								{{ $user->talks->count() . ' ' . str_plural('atividade', $user->talks->count()) }}
								como
								freelancer</h6>
						</div>
					</div>
				</div>
			</div>
			@empty
			<div class="d-flex flex-column align-items-center w-100">
				<span>Não existem usuários cadastrados</span>
				<a class="mt-4 btn text-white btn-success px-5 my-1 mx-3"
					href="{{ route('register') }}">@lang('layouts.navbar.register')</a>
			</div>
			@endforelse
		</div>
	</div>
</div>
@endsection
