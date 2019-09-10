@extends('layouts.main')

@section('title', $question->title . ' - Help Dev')

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-10">
		@include('shared.questions.item', ['question' => $question, 'tag' => 'h1'])
	</div>
</div>
@endsection
