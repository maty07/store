@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class=" col-md-8 offset-md-2">

			<div class="card">
				<div class="card-header">
					Nueva Imagen para Carrusel
				</div>
				<div class="card-body">
					{!! Form::open(['route' => 'carrusel.store', 'files' => 'true']) !!}
						@include('admin.carousel.form')
					{!! Form::close() !!}
				</div>
			</div>	
		</div>
	</div>
</div>

@endsection