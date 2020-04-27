@extends('layouts.main')

@php ($opposite = auth()->id() === $talk->user->id ? $talk->receiver : $talk->user)

@section('title', 'Conversa com ' . $opposite->name . ' - Help Dev')

@section('content')
<div class="row justify-content-center">
	<div class="col">
		@if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div>
		@endif
		<private-chat :user="{{ auth()->user() }}" :talk_id="{{ $talk->id }}" :opposite="{{ $opposite }}">
		</private-chat>
	</div>
</div>
@endsection
