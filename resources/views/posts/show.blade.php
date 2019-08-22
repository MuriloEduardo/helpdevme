@php ($post = $question->talks[0])
@php ($opposite = auth()->id() === $post->user->id ? $post->receiver : $post->user)

@extends('layouts.app')

@section('title', 'Conversa com ' . $opposite . ' - ')

@section('content')
<div class="py-5">
	<section class="bg-white p-3 rounded">
		<private-chat :user="{{ auth()->user() }}" :question="{{ $question }}" :opposite="{{ $opposite }}">
		</private-chat>
	</section>
</div>
@endsection
