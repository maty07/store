@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class=" col-md-8 offset-md-2">

			@include('layouts.success')

			<div class="card">
				<div class="card-header">
					Lista de Productos
					<div class="text-right"><a class="btn btn-sm btn-primary" href="{{ route('producto.create') }}">Nuevo</a></div>
				</div>
				<div class="card-body">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th width="10px">#</th>
								<th width="400">Name</th>
								<th>Precio</th>
								<th>Stock</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@if(!count($products))
							<td colspan="5">Sin registros</td>
							@else
								@foreach($products as $product)
									<tr>
										<td>{{ $product->id }}</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->price }}</td>
										<td>{{ $product->quantity }}</td>
										<td>
											<a class="btn btn-sm btn-info" href="{{ route('producto.show', $product->slug) }}">Ver</a>
										</td>
										<td>
											<a class="btn btn-sm btn-warning" href="{{ route('producto.edit', $product->id) }}">Editar</a>
										</td>
										<td>
											
											{!! Form::open(['route' => ['pro.delete', $product->id],
											'method' => 'PUT'])!!}
												{{Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger'])}}
											{!! Form::close() !!}
										</td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
					{{ $products->links() }}
				</div>
			</div>	
		</div>
	</div>
</div>

@endsection