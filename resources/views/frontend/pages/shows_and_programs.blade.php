@extends('frontend.layouts.app')
@section('content')

<section id="shows-and-prgrams">
	<div class="container">
		
		<div class="row pt-4 pb-4">
			<div class="col-md-12 text-center">
				<h3>Shows and Events</h3>
				<p>Book All your favourites shows and events with zero costing and ease</p>
			</div>
			<div class="col-md-12 mt-3">
				<form action="{{ route('frontend.showsandprograms') }}" method="GET">
					<input type="search" class="form-control" placeholder="Enter Event name , author name etc ..." value="{{ request('search') }}" name="search">
				</form>
			</div>
		</div>
		<div class="row pt-4 pb-4">
			@foreach($events as $event)
			<div class="col-xs-12 col-md-6 bootstrap snippets bootdeys">
				<!-- product -->
				<div class="product-content product-wrap clearfix">
					<div class="row">
						<div class="col-md-5 col-sm-12 col-xs-12">
							<div class="product-image"> 
								<img src="{{ asset('main.jpg') }}" alt="Title of the show" width="194px"height="228px"> 
								<span class="tag2 hot">
									OPEN
								</span> 
							</div>
						</div>
						<div class="col-md-7 col-sm-12 col-xs-12">
							<div class="product-deatil">
								<h5 class="name">
									<a href="#">
										{{ $event->name }}<span>{{ $event->category }}</span>
										<span>{{ $event->available_seats }} seats available</span>
									</a>
								</h5>
								<p class="price-container">
									<span>$.{{ $event->price }}</span>
								</p>
								<span class="tag1"></span> 
							</div>
							<div class="description">
								<p>From : {{ $event->start_time->format('h:i:s a Y M D') }}</p>
								<p>From : {{ $event->end_time->format('h:i:s a Y M D') }}</p>
							</div>
							<div class="product-info smart-form">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12"> 
										@if($event->total_seats > $event->total_reservation)
										<a href="{{ route('frontend.detail_showsandprograms',$event->id) }}" class="btn btn-block btn-success">Book Now</a>
										@else
										<button class="btn btn-block btn-danger" disabled="true">House Full</button>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="row">
			<div class="col-md-12">
				{{ $events->appends(request()->all())->links() }}
			</div>
		</div>
	</div>
</section>

@endsection