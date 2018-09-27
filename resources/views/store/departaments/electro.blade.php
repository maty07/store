@extends('layouts.app')

@section('title', 'Electro')

@section('content')

@include('layouts.nav_depart')

<div class="container">
	<div class="row mt-5">
		@foreach($categories as $cat)
			<div class="col-md-4 my-2">
				<div class="card" style="width: 20rem;">
					<img class="card-img-top" src="{{ $cat->image }}">
					<div class="card-body">
						<h4 class="text-center">
							<a href='{{ route("category.detail", ["id" => $cat->id, "slug" => $cat->slug] ) }}'>{{ $cat->name }}</a>
						</h4>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>

@endsection
