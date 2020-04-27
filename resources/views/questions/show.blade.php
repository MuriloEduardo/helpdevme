@extends('layouts.main')

@section('title', $question->title . ' - Help Dev')

@section('content')
<div class="row">
	<div class="col">
		@include('shared.questions.item', ['question' => $question, 'tag' => 'h1'])
	</div>
</div>
@endsection
