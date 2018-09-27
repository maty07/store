@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class=" col-md-8 offset-md-2">

			<div class="card">
				<div class="card-header">
					Nuevo Departamento
				</div>
				<div class="card-body">
					{!! Form::open(['route' => 'departamento.store']) !!}
						@include('admin.departament.form')
					{!! Form::close() !!}
				</div>
			</div>	
		</div>
	</div>
</div>

@endsection