@extends('layouts.app')

@section('title', 'Categorias')

@section('content')

@include('layouts.nav_depart')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 mt-5">
			<ul class="list-group">
				<li class="list-group-item py-4">
					MARCA
				</li>
				<li class="list-group-item py-4">
					PRECIO
				</li>
				<li class="list-group-item py-4">
					SISTEMA OPERATIVO
				</li>
				<li class="list-group-item py-4">
					RAM
				</li>
				<li class="list-group-item py-4">
					CAPACIDAD
				</li>
				<li class="list-group-item py-4">
					PRODUCTO
				</li>
				<li class="list-group-item py-4">
					COMPAÑIA
				</li>


			</ul>
		</div>
		<div class="col-md-9" style="background-color: #fff;">
			
		@foreach($products as $product)
			<div class="cards">
				<a href="{{ route('product.detail', $product->slug) }}">
					<img class="img-fluid" src="{{ $product->image }}">
				</a>
				<div class="mt-3">
					<h6>
						<a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
					</h6>
				</div>
			</div>
			<!-- <div class="card my-3">
				<img class="card-img-top" src="{{ $product->image }}">
				<div class="card-body">
					<h6>
						<a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
					</h6>
				</div>
			</div>	 -->
	  	@endforeach

		
			
			
			
		</div>
	</div>
</div>


@endsection