@extends('layouts.main')

@section('title', $title . ' - Help Dev')

@section('content')
<div class="row">
	<div class="col">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul class="nav flex-column">
				@foreach ($errors->all() as $error)
				<li class="nav-item">{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div>
		@endif
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="mb-5">
			<h1>{{ $title }}</h1>
			<p class="lead">Aqui abaixo ficarão os pedidos de ajuda de outros programadores</p>
		</div>
		<div class="row">
			@if ($tags->count())
			<div class="col-lg-2">
				<h4 class="font-weight-light">Linguagens</h4>
				<ul class="list-group list-group-flush">
					@foreach ($tags as $tag)
					<li class="list-group-item">
						<div class="d-flex align-items-center justify-content-between">
							<a href="{{ url('tags/' . $tag->slug) }}">
								<span>
									<i class="{{ $tag->image }} colored fa-lg mr-2"></i>
									<span>{{ $tag->title }}</span>
								</span>
							</a>
							<span class="badge badge-primary badge-pill">{{ $tag->questions->count() }}</span>
						</div>
					</li>
					@endforeach
			</div>
			</ul>
			@endif
			<div class="col">
				<list-new-questions></list-new-questions>
				@foreach($questions as $question)
				@include('shared.questions.item', ['question' => $question])
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
