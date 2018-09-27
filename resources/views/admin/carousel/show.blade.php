@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row my-3">
		<div class="col-md-12 text-center">
			<img class="img-fluid my-3" src="{{ $carousel->path }}" width="800px" height="auto">
			<h3 class="">{{ $carousel->name }}</h3>
		</div>
	</div>
</div>

@endsection