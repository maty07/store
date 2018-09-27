@extends('layouts.app')

@section('title', 'Home')

@section('content')
@include('layouts.nav_depart')

<div class="container">
    <div class="row">
    	<div class="col-sm-12">
	        <div id="carousel" class="carousel slide my-5" data-ride="carousel">
				 <div class="carousel-inner">
				  

				    @php($count = 0)

				    @foreach($carousels as $carousel)

				    @if($count == 0)
						<div class="carousel-item active">
					@else
					    <div class="carousel-item">
					@endif			 
					     <img class="img-carousel" src="{{ $carousel->path }}">
					    </div>

					@php($count++)

					@endforeach
				 
				   
					  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
				</div>
	        </div>
	    </div>
	</div>
</div>

@endsection


