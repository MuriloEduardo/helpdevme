@extends('layouts.app')

@section('title', 'Perguntas - ')

@section('content')
<div class="py-5">
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
		<div class="col-lg-2 col-md-3">
			<online-users></online-users>
		</div>
	</div>
</div>
@endsection
