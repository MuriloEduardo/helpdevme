@extends('layouts.public')

@section('title', 'Suas Conversas - Help Dev')

@section('content')
<div class="container-fluid py-5">
	<div class="row">
		<div class="col">
			@if(session()->get('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}
			</div>
			@endif
			<private-chat :user="{{ auth()->user() }}">
			</private-chat>
		</div>
	</div>
</div>
@endsection
