@extends('layouts.app')

@section('title', 'Tags - ')

@section('content')
<div class="row">
	<div class="col-lg-10 offset-1">
		<h1 class="display-4 mb-4">Tags</h1>
		<div class="tags-index row">
			@foreach ($tags as $tag)
			<div class="col-lg-3 py-3">
				<div class="card">
					<div class="card-body">
						<a href="{{ route('tags.show', $tag) }}">
							<div class="d-flex align-items-center mb-3">
								<i class="{{ $tag->image }} colored"></i>
								<h2 class="h5 card-title my-0 mx-3">{{ $tag->title }}</h2>
							</div>
						</a>
						<div class="card-text">
							<small class="text-muted">Usada em {{ $tag->questions->count() }} pergunta(s)</small>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
