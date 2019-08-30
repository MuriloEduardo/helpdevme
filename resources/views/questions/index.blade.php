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

		<div class="mb-5">
			<h1>Crie perguntas ou ajude outros programadores</h1>
			<p class="lead">Peça seu pedido de ajuda, fique por dentro das perguntas e tag's que mais estão bombando
				no momento.</p>
		</div>
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
			<div class="col create-question">
				<b-button @click="$bvModal.show('modal-create-question')" variant="link"
					class="btn-block card card-body card mb-5">
					<div class="d-flex align-items-center">
						<div class="pr-3">
							@include('shared.avatar', ['user' => auth()->user(), 'icon_class' => 'fa-4x'])
						</div>
						<div class="flex-grow-1">
							<div class="placeholder text-muted py-3">Qual sua dúvida sobre programação?</div>
						</div>
					</div>
				</b-button>
			</div>
		</div>
		<div class="row">
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
