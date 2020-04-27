@extends('layouts.main')

@section('title', 'Tags - Help Dev')

@section('content')
<div class="row">
	<div class="col">
		<h1 class="display-4 mb-4">Tags</h1>
		<div class="tags-index row">
			@foreach ($tags as $tag)
			<div class="col-lg-3 py-3">
				<div class="card">
					<div class="card-body">
						<a href="{{ route('tags.show', $tag) }}">
							<div class="d-flex align-items-center mb-3">
								<i class="{{ $tag->image }} colored fa-2x"></i>
								<h2 class="h5 card-title my-0 mx-3">{{ $tag->title }}</h2>
							</div>
						</a>
						<div class="card-text">
							<div class="text-muted">Usada em {{ $tag->questions->count() . ' ' . str_plural('pergunta', $tag->questions->count()) }}</div>
							<div class="text-muted">{{ $tag->users->count() }} usuários dominam essa linguagem</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@endsection
