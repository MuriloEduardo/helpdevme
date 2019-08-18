@extends('layouts.app')

@section('title', 'Conversas - ')

@section('content')
<div class="row">
	<div class="col-lg-10 offset-1">
		<h1 class="display-4 mb-5">Conversas</h1>
		<div class="list-group">
			@forelse($talks as $talk)
			@php ($opposite = auth()->id() === $talk->user->id ? $talk->receiver : $talk->user)
			<a href="{{ route('talks.show', $talk) }}"
				class="list-group-item list-group-item-action flex-column align-items-start">
				<div class="row align-items-center">
					<div class="col-1">
						@include('shared.avatar', ['user' => $opposite])
					</div>
					<div class="col">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">
								<span>Conversa com</span>
								<span>{{ $opposite->name }}</span>
							</h5>
							<small class="text-muted">{{ $talk->published }}</small>
						</div>
						<small class="text-muted">Em {{ $talk->question->title }}</small>
					</div>
				</div>
			</a>
			@empty
			<p>Você não possui conversas</p>
			@endforelse
		</div>
	</div>
</div>
@endsection
