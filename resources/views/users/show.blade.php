@extends('layouts.main') @section('title', $user->name . ' - Help Dev')
@section('content')
<div class="row">
	<div class="col-lg-10 m-auto">
		<div class="row">
			<div class="col-lg-4">
				@include('shared.avatar', ['user' => $user, 'icon_class' =>
				'fa-4x'])
				<h1 class="font-weight-light">{{ $user->name }}</h1>
				<p class="lead">{{ $user->email }}</p>
				<div>
					<h3 class="h6">Linguagens que domina</h3>
					<div class="d-flex">
						@foreach($user->tags as $tag)
						<a
							href="{{ route('tags.show', $tag) }}"
							class="badge badge-primary badge-pill m-1"
						>
							<div class="d-flex align-items-center p-1">
								<i
									class="{{ $tag->image }} colored fa-lg mr-1"
								></i>
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
								<span
									class="h1"
									>{{ $user->talks->count() }}</span
								>
								<br />
								{{ str_plural('ajuda', $user->talks->count()) . ' ' . str_plural('prestada', $user->talks->count()) }}
							</h5>
						</div>
					</div>
					<div class="col">
						<div class="card card-body">
							<h5>
								<span
									class="h1"
									>{{ $user->questions->count() }}</span
								>
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
