@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class=" col-md-8 offset-md-2">

			@include('layouts.success')

			<div class="card">
				<div class="card-header">
					Lista de Categorias
					<div class="text-right"><a class="btn btn-sm btn-primary" href="{{ route('categoria.create') }}">Nuevo</a></div>
				</div>
				<div class="card-body">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th width="10px">#</th>
								<th>Name</th>
								<th>Departamento</th>
								<th colspan="2">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@if(!count($categories))
							<td colspan="4">Sin registros</td>
							@else
								@foreach($categories as $category)
									<tr>
										<td>{{ $category->id }}</td>
										<td>{{ $category->name }}</td>
										<td>{{ $category->departament_id }}</td>
										<td>
											<a class="btn btn-sm btn-warning" href="{{ route('categoria.edit', $category->id) }}">Editar</a>
										</td>
										<td>
											
											{!! Form::open(['route' => ['category.delete', $category->id], 'method' => 'PUT'])!!}
												{{Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger'])}}
											{!! Form::close() !!}
										</td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
					{{ $categories->links() }}
				</div>
			</div>	
		</div>
	</div>
</div>

@endsection