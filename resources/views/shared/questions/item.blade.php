<div class="card mb-4 question">
	<div class="card-body">
		<div class="row">
			<div class="col">
				<a href="{{ route('questions.show', $question) }}" class="d-flex align-items-center">
					@include('shared.questions.status', ['question' => $question])
					<h1 class="ml-2 mb-0">{{ $question->title }}</h1>
				</a>
			</div>
			<div class="col-lg-2">
				<div class="text-success d-flex align-items-end flex-column">
					<h5>{{ 'R$ ' . number_format($question->budget, 2, ',', '.') }}</h5>
					<small>Orçamento Médio</small>
				</div>
			</div>
			@if ($question->user_id == auth()->id())
			<div class="col flex-grow-0">
				<b-dropdown right variant="link">
					<template v-slot:button-content>
						<i class="fas fa-ellipsis-v"></i>
					</template>
					<b-dropdown-item href="{{ route('questions.edit', $question) }}">Editar</b-dropdown-item>
				</b-dropdown>
			</div>
			@endif
		</div>
		<!-- Body -->
		<article class="pt-3">{!! $question->body !!}</article>
		<!-- Tags, User -->
		<div class="d-flex justify-content-between py-3">
			<!-- Tags -->
			<div>
				@foreach($question->tags as $tag)
				<a href="{{ route('tags.show', $tag) }}" class="badge badge-primary badge-pill">
					<div class="d-flex align-items-center p-1">
						<i class="{{ $tag->image }} colored fa-lg mr-1"></i>
						<span>{{ $tag->title }}</span>
					</div>
				</a>
				@endforeach
			</div>
			<!-- User -->
			<div class="text-right small">
				<span>{{ $question->published }} por</span>
				<a href="{{ route('users.show', $question->user) }}" class="d-inline-block">
					<div class="d-flex align-items-center justify-content-end">
						<span class="mr-2">{{ $question->user_id == auth()->id() ? 'Eu' : $question->user->name }}</span>
						@include('shared.avatar', ['user' => $question->user, 'icon_class' =>
						'fa-2x'])
					</div>
				</a>
			</div>
		</div>
		<!-- Views, Likes, Comments -->
		<div class="d-flex align-items-center justify-content-between py-3">
			<votes-question :question_id="{{ $question->id }}">
			</votes-question>
			<small>{{ $question->views->count() }}
				visualizaç{{ $question->views->count() == 1 ? 'ão' : 'ões' }}</small>
			<count-comments :question_id="{{ $question->id }}"></count-comments>
		</div>
		<!-- Ações -->
		<actions-question class="py-3 border-top" :question="{{ $question }}"></actions-question>
		<!-- Create Comment -->
		<c-comments :question_id="{{ $question->id }}"></c-comments>
	</div>
</div>
