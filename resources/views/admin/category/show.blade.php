@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		@foreach($products as $product)
			<div class="my-3 col-md-3">
				<div class="card" style="width: 14rem;">
					<img class="card-img-top" src="{{ $product->image }}">
					<div class="card-body">
						<h3>
							<a href="{{ route('producto.show', $product->id) }}">{{ $product->name }}</a>
						</h3>
					</div>
				</div>	
			</div>
		@endforeach
	</div>
</div>

@endsection