@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class=" col-md-8 offset-md-2">

			@include('layouts.success')

			<div class="card">
				<div class="card-header">
					Lista de Departamentos
					<div class="text-right"><a class="btn btn-sm btn-primary" href="{{ route('departamento.create') }}">Nuevo</a></div>
				</div>
				<div class="card-body">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th width="10px">#</th>
								<th width="400">Name</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@if(!count($departaments))
							<td colspan="5">Sin registros</td>
							@else
								@foreach($departaments as $departament)
									<tr>
										<td>{{ $departament->id }}</td>
										<td>{{ $departament->name }}</td>
										<td>
											<a class="btn btn-sm btn-primary" href="{{ route('departamento.show', $departament->id) }}">Ver</a>
										</td>
										<td>
											<a class="btn btn-sm btn-warning" href="{{ route('departamento.edit', $departament->id) }}">Editar</a>
										</td>
										<td>
											
											{!! Form::open(['route' => ['dep.delete', $departament->id],
											'method' => 'PUT'])!!}
												{{Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger'])}}
											{!! Form::close() !!}
										</td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>	
		</div>
	</div>
</div>

@endsection