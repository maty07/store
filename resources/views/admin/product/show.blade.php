@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<img class="img-fluid" src="{{ $product->image }}">
		</div>

		<div class="col-md-6">
			<h3>{{ $product->name }}</h3>
			<h4>{{ $product->price }}</h4>
			<p>{{ $product->quantity }}</p>
			<p>{{ $product->description }}</p>
		</div>
	</div>
</div>

@endsection