@extends('layouts.app')

@section('title', $user->name . ' - ')

@section('content')
<div class="py-5">
	<div class="row">
		<div class="col col-lg offset-lg-1">
			<div class="row align-items-center">
				<div class="col flex-grow-0">
					@include('shared.avatar', ['user' => $user, 'icon_class' => 'fa-4x'])
				</div>
				<div class="col">
					<h1 class="font-weight-light">{{ $user->name }}</h1>
					<p class="lead">{{ $user->email }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h2 class="my-5">{{ $user->talks->count() . ' ' . str_plural('ajuda', $user->talks->count()) }}</h2>
					@foreach ($user->talks as $talk)
					@include('shared.questions.item', ['question' => $talk->question])
					@endforeach
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h2 class="my-5">
						{{ $user->questions->count() . ' ' . str_plural('pedido', $user->questions->count()) }} de
						socorro</h2>
					@foreach ($user->questions as $question)
					@include('shared.questions.item', ['question' => $question])
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
