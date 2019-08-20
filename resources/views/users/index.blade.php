@extends('layouts.app')

@section('title', 'Usuários - ')

@section('content')
<div class="row">
	<div class="col col-lg-10 offset-lg-1">
		<h1 class="display-4 mb-4">Usuários</h1>
		<div class="row">
			@foreach($users as $user)
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
								{{ $user->talks->count() . ' ' . str_plural('atividade', $user->talks->count()) }} como
								freelancer</h6>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
