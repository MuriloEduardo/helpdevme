@extends('layouts.main')

@section('title', 'Perguntas - Help Dev')

@section('content')
<div class="row">
	@if ($tags->count())
	<div class="col-lg-3">
		<ul class="list-group list-group-flush sticky-top top-navbar-height">
			<h4 class="font-weight-light mb-3">Tag's</h4>
			@foreach ($tags as $tag)
			<a href="{{ url('tags/' . $tag->slug) }}" class="list-group-item">
				<div class="d-flex align-items-center justify-content-between">
					<span>
						<i class="{{ $tag->image }} colored fa-lg mr-2"></i>
						<span>{{ $tag->title }}</span>
					</span>
					<span class="badge badge-primary badge-pill">{{ $tag->questions->count() }}</span>
				</div>
			</a>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="col">
		<div class="mb-5 pb-4">
			<h1>Fique de olho!</h1>
			<p class="lead">Aqui abaixo ficarão os pedidos de ajuda de outros programadores</p>
		</div>
		<div class="row">
			<div class="col">
				@if ($errors->any())
				<div class="alert alert-danger fixed-top">
					<ul class="nav flex-column">
						@foreach ($errors->all() as $error)
						<li class="nav-item">{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				@if(session()->get('success'))
				<div class="alert alert-success fixed-top">
					{{ session()->get('success') }}
				</div>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col">
				<list-new-questions :questions="{{ $questions }}"></list-new-questions>
				@foreach($questions as $question)
				@include('shared.questions.item', ['question' => $question])
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
