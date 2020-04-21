@extends('layouts.main')

@section('title', 'Usuários - Help Dev')

@section('content')
<div class="row">
	<div class="col-lg-10 offset-lg-1">
		<h1 class="display-4 mb-4">Usuários</h1>
		<div class="card-columns">
			@forelse($users as $user)
			<div class="card users-index-user">
				<div class="card-body">
					<div class="row">
						<div class="col flex-grow-0">
							@include('shared.avatar', ['user' => $user, 'icon_class' => 'fa-4x mb-4 m-lg-0'])
							<i title="{{ $user->email_verified_at ? 'Email verificado' : 'Email não verificado' }}" v-b-tooltip.hover aria-haspopup="true" class="fas fa-check-circle position-absolute {{ $user->email_verified_at ? 'text-success' : 'text-secondary' }}"></i>
						</div>
						<div class="col text-truncate">
							<h5 class="card-title text-truncate mb-1">
								<a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
							</h5>
							<p class="card-text text-truncate">{{ $user->email }}</p>
						</div>
					</div>
					<div class="mt-4">
						<div class="text-muted">
							{{ $user->questions->count() . ' ' . str_plural('atividade', $user->questions->count()) }} como aprendiz</div>
						<div class="text-muted m-0">
							{{ $user->talks->count() . ' ' . str_plural('atividade', $user->talks->count()) }} como mentor</div>
					</div>
					@if($user->tags->count() > 0)
					<div class="mt-3 pt-3 border-top">
						<h3 class="h6 text-muted">Linguagens de programação</h3>
						<div class="d-flex">
							@foreach($user->tags as $tag)
							<a href="{{ route('tags.show', $tag) }}" class="badge badge-primary badge-pill m-1">
								<div class="d-flex align-items-center p-1">
									<i class="{{ $tag->image }} colored fa-lg mr-1"></i>
									<span>{{ $tag->title }}</span>
								</div>
							</a>
							@endforeach
						</div>
					</div>
					@endif
				</div>
			</div>
			@empty
			<div class="d-flex flex-column align-items-center w-100">
				<span>Não existem usuários cadastrados</span>
				<a class="mt-4 btn text-white btn-success px-5 my-1 mx-3" href="{{ route('register') }}">@lang('layouts.navbar.register')</a>
			</div>
			@endforelse
		</div>
	</div>
</div>
@endsection
