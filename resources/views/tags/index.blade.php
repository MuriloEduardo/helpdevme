@extends('layouts.app')

@section('content')
<h1 class="display-4 mb-5">Tags</h1>
<div class="card-columns tags-index">
	@foreach ($tags as $tag)
	<div class="card">
		<div class="card-body">
			<a href="{{ route('tags.show', $tag) }}">
				<div class="d-flex align-items-center mb-3">
					<i class="{{ $tag->image }} colored"></i>
					<h2 class="h5 card-title my-0 mx-3">{{ $tag->title }}</h2>
				</div>
			</a>
			<div class="card-text">
				<small class="text-muted">Usada em {{ count($tag->questions) }} pergunta(s)</small>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection
