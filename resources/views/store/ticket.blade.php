@extends('layouts.app')


@section('content')

<div class="container text-center">
	<h2 class="my-5">Compra realizada con éxito</h2>
	<h4 class="my-5">Gracias por comprar en nuestra tienda</h4>
	<a class="btn btn-primary btn-lg" href="{{ route('home') }}">Volver al Home</a>
</div>

@endsection