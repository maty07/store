@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
			@foreach($categories as $category)
				<div class="card" style="width: 16rem;">
					<div class="card-body">
						<div class="card-title">{{ $category->name }}</div>
						<a href="{{ route('categoria.show', $category->id) }}">Visitar</a>
					</div>
				</div>	
			@endforeach
	</div>
</div>

@endsection