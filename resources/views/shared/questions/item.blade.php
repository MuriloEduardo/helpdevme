<div class="card mb-4 question">
	<div class="card-body">
		<!-- Title, body, tags, user -->
		<h3 class="h5">
			<a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a>
		</h3>
		@include('shared.questions.status', ['question' => $question])
		<article class="pt-3">{!! $question->body !!}</article>
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
						<span
							class="mr-2">{{ $question->user_id == auth()->id() ? 'Eu' : $question->user->name }}</span>
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
		<actions-question class="py-3 border-top" :question_id="{{ $question->id }}"></actions-question>
		<!-- Create Comment -->
		<c-comments :question_id="{{ $question->id }}"></c-comments>
	</div>
</div>
