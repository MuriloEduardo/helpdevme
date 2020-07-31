@extends('layouts.public')

@php ($opposite = auth()->id() === $talk->user->id ? $talk->receiver : $talk->user)

@section('title', 'Conversa com ' . $opposite->name . ' - Help Dev')

@section('content')
<div class="container-fluid bg-white h-100">
	<div class="row h-100">
		<div class="col h-100">
			@if(session()->get('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}
			</div>
			@endif
			<private-chat :user="{{ auth()->user() }}" :talk_id="{{ $talk->id }}" :opposite="{{ $opposite }}">
			</private-chat>
		</div>
	</div>
</div>
@endsection
