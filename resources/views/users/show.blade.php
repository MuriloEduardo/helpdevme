@extends('layouts.main') @section('title', $user->name . ' - Help Dev')
@section('content')
<div class="row">
	<div class="col">
		<div class="row">
			<div class="col-lg-4">
				@include('shared.avatar', ['user' => $user, 'icon_class' => 'fa-4x', 'circle' => false])
				<h1 class="mt-3 font-weight-light">{{ $user->name }}</h1>
				<div class="mb-3">
					<span class="lead">{{ $user->email }}</span>
					<i title="{{ $user->email_verified_at ? 'Email verificado' : 'Email não verificado' }}" v-b-tooltip.hover aria-haspopup="true" class="fas fa-check-circle {{ $user->email_verified_at ? 'text-success' : 'text-secondary' }}"></i>
				</div>
				<div>
					<h3 class="h6">Linguagens que domina</h3>
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
			</div>
			<div class="col">
				<div class="row">
					<div class="col">
						<div class="card card-body">
							<h5>
								<span class="h1">{{ $user->talks->count() }}</span>
								<br />
								{{ str_plural('ajuda', $user->talks->count()) . ' ' . str_plural('prestada', $user->talks->count()) }}
							</h5>
						</div>
					</div>
					<div class="col">
						<div class="card card-body">
							<h5>
								<span class="h1">{{ $user->questions->count() }}</span>
								<br />
								{{ str_plural('pedido', $user->questions->count()) }}
								de socorro
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
