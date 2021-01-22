@extends('frontend.layouts.app')
@section('content')

<section id="success-page">
	<div class="container">
		<div class="row text-center">
	        <div class="col-sm-12 col-12 col-md-12 col-lg-12">
	        <br><br> <h2 style="color:#0fad00">Success</h2>
	        <img src="{{ asset('success.png') }}" class="img-fluid success-img">
	        <h3>Dear, {{ auth()->user()->name }}</h3>
	        <p style="font-size:20px;color:#5C5C5C;">Thank you for reserving seats for your favourite 	shows or event with us . We have send you a email regarding other details and print of the ticket . Thank you !
			</p>
	        <a href="{{ url('/shows-and-programs') }}" class="btn btn-success">Explore More</a>
	    	<br><br>
	        </div>
	        
		</div>
	</div>
</section>


@endsection