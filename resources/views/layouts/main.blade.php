@extends('layouts.app')

@section('main')
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col py-5">
				@yield('content')
			</div>
			<div class="col-lg-2 py-3">
				<online-users></online-users>
			</div>
		</div>
	</div>
</section>
@endsection
