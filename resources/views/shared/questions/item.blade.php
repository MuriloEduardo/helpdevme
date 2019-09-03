<div class="card mb-4 question">
	<div class="card-body">
		<div class="row mb-4">
			<div class="col flex-grow-0">
				<votes-question :initi-votes="{{ count($question->votes) }}" :question="{{ $question }}">
				</votes-question>
				<div class="p-1 mt-2 d-flex flex-column align-items-center">
					<span>{{ $question->views->count() }}</span>
					<small>Visualizações</small>
				</div>
			</div>
			<div class="col">
				<h3 class="h5">
					<a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a>
				</h3>
				@include('shared.questions.status', ['question' => $question])
				<div>{!! $question->body !!}</div>
				<div class="row">
					<div class="col">
						@foreach($question->tags as $tag)
						<a href="{{ route('tags.show', $tag) }}" class="badge badge-primary badge-pill">
							<div class="d-flex align-items-center p-1">
								<i class="{{ $tag->image }} colored fa-lg mr-1"></i>
								<span>{{ $tag->title }}</span>
							</div>
						</a>
						@endforeach
					</div>
					<div class="col text-right">
						<div class="small mb-3">
							<span>{{ $question->published }} por</span>
							<a href="{{ route('users.show', $question->user) }}" class="d-inline-block">
								<div class="d-flex align-items-center justify-content-end py-2">
									<span
										class="mr-2">{{ $question->user_id == auth()->id() ? 'Eu' : $question->user->name }}</span>
									@include('shared.avatar', ['user' => $question->user, 'icon_class' =>
									'fa-2x'])
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<c-comments :question_id="{{ $question->id }}"></c-comments>
	</div>
</div>
