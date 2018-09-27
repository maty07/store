@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class=" col-md-8 offset-md-2">

			<div class="card">
				<div class="card-header">
					Editar Departamentos	
				</div>
				<div class="card-body">
					{!! Form::model($departament, ['route' => ['departamento.update', $departament->id], 
					'method' => 'PUT']) !!}
						@include('admin.departament.form')
					{!! Form::close() !!}
				</div>
			</div>	
		</div>
	</div>
</div>

@endsection