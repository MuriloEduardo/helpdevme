@extends('layouts.app')

@section('main')
<section>
	<div class="container">
		<div class="row">
			<div class="col py-5">
				@yield('content')
			</div>
		</div>
	</div>
</section>
@endsection
