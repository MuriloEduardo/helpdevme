@extends('layouts.main')

@section('title', $title . ' - Help Dev')

@section('content')
<div class="row">
	<div class="col">
		<div class="row justify-content-center">
			<div class="col-lg-7">
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
				<div class="mb-5">
					<div class="d-flex align-items-center justify-content-between">
						<h1>{{ $title }}</h1>
						<a class="btn btn-success" href="{{ route('questions.create') }}">Publicar
							Questão</a>
					</div>
					<p class="lead">Aqui abaixo ficarão os pedidos de ajuda de outros programadores</p>
				</div>
				<list-new-questions></list-new-questions>
				@forelse($questions as $question)
				<div class="row py-3 align-items-center question">
					<div class="col-lg-3">
						<div class="row align-items-center">
							<div class="col text-center">
								<votes-question :question_id="{{ $question->id }}">
								</votes-question>
							</div>
							<div class="col text-center">
								<strong>{{ $question->views->count() }}</strong>
								<br>
								<small>
									visita{{ $question->views->count() == 1 ? '' : 's' }}</small>
							</div>
							<div class="col text-center">
								<count-comments :question_id="{{ $question->id }}"></count-comments>
							</div>
						</div>
					</div>
					<div class="col">
						<h3 class="h5">
							<a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a>
						</h3>
						<div class="d-flex justify-content-between">
							<div>
								@foreach($question->tags as $tag)
								<a href="{{ route('tags.show', $tag) }}" class="badge badge-light badge-pill">
									<div class="d-flex align-items-center p-1">
										<i class="{{ $tag->image }} colored fa-xl mr-1"></i>
										<span>{{ $tag->title }}</span>
									</div>
								</a>
								@endforeach
							</div>
							<div class="text-right small">
								<span>{{ $question->published }} por</span>
								<a href="{{ route('users.show', $question->user) }}" class="d-inline-block">
									<div class="d-flex align-items-center justify-content-end">
										<span class="mr-2">{{ $question->user_id == auth()->id() ? 'Eu' : $question->user->name }}</span>
										@include('shared.avatar', ['user' => $question->user, 'icon_class' =>
										''])
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				@empty
				<div class="d-flex flex-column align-items-center w-100">
					<span>Não existem perguntas cadastradas</span>
					<a class="mt-4 btn text-white btn-success px-5 my-1 mx-3" href="{{ route('questions.create') }}">Publicar Questão</a>
				</div>
				@endforelse
			</div>
		</div>
	</div>
</div>
@endsection
