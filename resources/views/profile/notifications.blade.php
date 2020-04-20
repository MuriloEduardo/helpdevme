@extends('layouts.main')

@section('title', 'Notificações - Help Dev')

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-2">
		@include('profile.navigation')
	</div>
	<div class="col-lg">
		<h1>Notificações</h1>
		@forelse(auth()->user()->notifications as $notification)
		<div class="card card-body">
			@if($notification->type === 'App\\Notifications\\CreditsAdded')
			<div>Parabéns! Você recebeu @include('shared.budget', ['budget' => $notification->data['budget']]) de saldo por se cadastrar!</div>
			@endif
		</div>
		@empty
		<div class="d-flex flex-column align-items-center w-100">
			<span>Sem Notificações</span>
		</div>
		@endforelse
	</div>
</div>
@endsection
