@extends('layouts.app')

@section('title', $tag->title . ' - ')

@section('content')
<div class="py-5">
	<div class="row justify-content-center">
		<div class="col-lg-10">
			<div class="my-5">
				<div class="d-flex align-items-center mb-3">
					<i class="{{ $tag->image }} colored fa-5x"></i>
					<h1 class="display-4 my-0 mx-3">{{ $tag->title }}</h1>
				</div>
				<p class="lead">Usada em {{ count($tag->questions) }} pergunta(s)</p>
			</div>
			@foreach ($tag->questions as $question)
			@include('shared.questions.item', ['question' => $question])
			@endforeach
		</div>
	</div>
</div>
@endsection
