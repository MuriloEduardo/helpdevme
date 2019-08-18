@extends('layouts.app')

@section('title', 'Perguntas - ')

@section('content')
<div class="row">
	<div class="col offset-lg-2">
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
							@include('shared.avatar', ['user' => auth()->user()])
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
				<div class="card mb-4 question">
					<div class="card-body">
						<div class="row">
							<div class="col flex-grow-0">
								<votes-question :initi-votes="{{ count($question->votes) }}"
									:question="{{ $question }}">
								</votes-question>
							</div>
							<div class="col">
								<h3 class="h5">
									<a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a>
								</h3>
								@include('shared.questions.status', ['question' => $question])
								<p>{!! $question->body !!}</p>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col text-right">
								<div class="small mb-3">
									<span>{{ $question->published }} por</span>
									<a href="{{ route('users.show', $question->user) }}">
										<div class="d-flex align-items-center justify-content-end py-2">
											<span class="mr-2">{{ $question->user->name }}</span>
											@include('shared.avatar', ['user' => $question->user])
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								@foreach($question->tags as $tag)
								<a href="{{ route('tags.show', $tag) }}"
									class="badge badge-primary">{{ $tag->title }}</a>
								@endforeach
							</div>
						</div>
						<c-comments :question="{{ $question }}"></c-comments>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-3">
		<online-users></online-users>
	</div>
</div>
@endsection
