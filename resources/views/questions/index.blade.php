@extends('layouts.main')

@section('title', 'Perguntas - Help Dev')

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
			<h1>Fique de olho!</h1>
			<p class="lead">Aqui abaixo ficarão os pedidos de ajuda de outros programadores</p>
		</div>
		@if ($tags->count())
		{{-- <h4 class="font-weight-light mb-3">Tag's</h4> --}}
		<div class="row mb-5">
			@foreach ($tags as $tag)
			<div class="col-lg-2">
				<div class="card card-body">
					<div class="d-flex align-items-center justify-content-between">
						<a href="{{ url('tags/' . $tag->slug) }}">
							<span>
								<i class="{{ $tag->image }} colored fa-lg mr-2"></i>
								<span>{{ $tag->title }}</span>
							</span>
						</a>
						<span class="badge badge-primary badge-pill">{{ $tag->questions->count() }}</span>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@endif
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
