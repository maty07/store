@extends('layouts.app')

@section('title', 'Carrito de compras')

@section('content')

@include('layouts.nav_depart')

<section class="container">
	<div class="row mt-3">
		<div class="col-md-8">

			<h1 class="mb-3"><b>Tu carro</b></h1>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody id="cart"></tbody>
			</table>

		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h2 class="card-title">Total: $&nbsp;<span id="total"></span></h2>

					<button class="btn btn-block btn-primary my-5" id="buy">
						Comprar
					</button>

					Puedes pagar con los siguientes medios:

					<img class="img-fluid mt-3" src="https://www.paris.cl/wcsstore/CencosudStorefrontAssetStore/images/img-medios-de-pago-pdp.jpg">
				</div>
			</div>
		</div>
	</div>
</section>

@endsection