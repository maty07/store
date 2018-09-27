@extends('layouts.app')

@section('title', 'Productos')

@section('content')

@include('layouts.nav_depart')

<div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
			<img class="img-fluid" src="{{ $product->image }}">
		</div>

		<div class="col-md-6">
			<h1>{{ title_case($product->name) }}</h1>
			<h4 class="my-4">$ &nbsp;{{ $product->price }}</h4>
			
				<form class="form-inline">
					<label class="my-1 mr-2">Cantidad</label>
					<input type="hidden" id="pro-id" value="{{ $product->id }}">
					<input type="hidden" id="price" value="{{ $product->price }}">
					<input type="hidden" id="name" value="{{ $product->name }}">
					<select class="form-control my-1 mr-sm-2" id="quantity">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>


					<button type="button" id="btn-agregar" class="btn btn-primary my-1">AGREGAR AL CARRO</button>
				</form>		

		</div>
	</div>
	<div class="row my-5">
		<p>{{ $product->description }}</p>
	</div>

</div>

@endsection