@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class=" col-md-8 offset-md-2">

			<div class="card">
				<div class="card-header">
					Editar Categoria	
				</div>
				<div class="card-body">
					{!! Form::model($category, ['route' => ['categoria.update', $category->id], 
					'method' => 'PUT', 'files' => true]) !!}
						@include('admin.category.form')
					{!! Form::close() !!}
				</div>
			</div>	
		</div>
	</div>
</div>

@endsection