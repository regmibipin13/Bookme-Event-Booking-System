@extends('frontend.layouts.app')
@section('content')

<section id="reservation">
	<div class="container pt-5 pb-5">
		@if($event->is_custom_seat)
		<div class="row mt-3 mb-5">
			<div class="col-md-12 d-flex align-items-center">
				<div class="reservedbox"></div>
				&nbsp; &nbsp;
				Reserved / Booked
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="availablebox"></div>
				&nbsp;&nbsp;
				Available
				&nbsp;&nbsp;
				<div class="selectedbox"></div>
				&nbsp;&nbsp;
				Selected
			</div>
		</div>
		<seat-reservation :seats="{{ $event->custom_seats }}":event="{{ $event }}" inline-template v-cloak>
			<div class="row">
				<div class="col-md-1 col-lg-1 col-sm-3 col-3 m-3 single-seat" v-for="(seat,index) in seats" :class="{'occupied': seat.occupied, 'activeOccupied':selectedNames.includes(seat.name)}" @click="selectSeat(seat)">
					<i class="fa fa-2x fa-wheelchair" :class="{'colorwhite':seat.occupied}"></i>
					<span>@{{ seat.name }}</span>
				</div>
				<div class="col-md-12 mt-4">
					<span>Selected Seats:</span>
					&nbsp;
					<span class="badge-pill badge-success" v-for="seat in selectedNames">@{{ seat }}</span>&nbsp;&nbsp;
				</div>
				<div class="col-md-12 mt-4">
					<a href="#" class="btn btn-success" @click.prevent="onSubmit">Confirm Reservation and Continue</a>
					<a href="#" class="btn btn-danger" @click.prevent="reset">Reset the selection</a>
				</div>
			</div>
		</seat-reservation>
		@else
		<div class="row">
			<div class="col-md-12">
				<form action="{{ url('/api/reserve-seats/'.$event->id) }}" method="POST">
					@csrf
					<div class="form-group">
						<label>Total Seats to Reserved</label>
						<input type="text" name="seats" class="form-control" placeholder="Total number of seats to be reserved">
					</div>
					<button class="btn btn-success" type="submit">Confirm and Continue</button>
				</form>
			</div>
		</div>
		@endif
	</div>
</section>


@endsection