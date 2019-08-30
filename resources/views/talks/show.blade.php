@extends('layouts.main')

@section('content')
@php ($opposite = auth()->id() === $talk->user->id ? $talk->receiver : $talk->user)
<div class="py-5">
	@if(session()->get('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>
	@endif
	<h1>{{ $talk->question->title }}</h1>
	<private-chat :user="{{ auth()->user() }}" :talkprop="{{ $talk }}" :posts="{{ $talk->posts }}"
		:opposite="{{ $opposite }}"></private-chat>
</div>
@endsection
