@extends('layouts.public')

@php ($opposite = auth()->id() === $talk->user->id ? $talk->receiver : $talk->user)

@section('title', 'Conversa com ' . $opposite->name . ' - Help Dev')

@section('content')
<div class="container-fluid py-5">
	<div class="row">
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
</div>
@endsection
