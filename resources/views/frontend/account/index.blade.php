@extends('frontend.layouts.app')
@section('content')
<section id="my-account">
    <div class="container pt-5 pb-5">
      <div class="row">
        <div class="col-md-12">
          <a class="btn btn-lg btn-danger float-right" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
        </div>
      </div>
        <div class="row">
            <div class="col-md-12 text-center ">
                <nav class="nav-justified ">
                  <div class="nav nav-tabs " id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#pop1" role="tab" aria-controls="pop1" aria-selected="true">My Profile</a>
                    <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#pop2" role="tab" aria-controls="pop2" aria-selected="false">My Reservations</a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  	<div class="tab-pane fade show active" id="pop1" role="tabpanel" aria-labelledby="pop1-tab">
                       <form class="p-5" action="{{ route('frontend.update_account') }}" method="POST">
                          @csrf
                       		<div class="form-group">
                       			<input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}">
                       		</div>
                       		<div class="form-group">
                       			<input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                       		</div>
                       		<div class="form-group">
                       			<input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $user->phone }}">
                       		</div>
                       		<div class="form-group">
                       			<input type="password" name="password" class="form-control" placeholder="Password">
                       		</div>
                       		<div class="form-group">
                       			<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                       		</div>
                       		<div class="form-group">
                       			<button type="submit" class="btn btn-success btn-block">Save</button>
                       		</div>
                       </form>
                    </div>
                  	<div class="tab-pane fade" id="pop2" role="tabpanel" aria-labelledby="pop2-tab">
                      <table class="table mt-4">
          						  <thead class="thead-dark">
          						    <tr>
          						      <th scope="col">#</th>
          						      <th scope="col">Show / Event</th>
          						      <th scope="col">Date</th>
          						      <th scope="col">Status</th>
          						    </tr>
          						  </thead>
          						  <tbody>
                          @foreach($user->reservations as $reservation)
          						    <tr>
          						      <th scope="row">{{ $reservation->id }}</th>
          						      <td>{{ $reservation->event->name }}</td>
          						      <td>{{ $reservation->created_at->format('Y M D') }}</td>
          						      <td>
          						      	<span class="badge-pill badge-success">success</span>
          						      </td>
          						    </tr>
                          @endforeach
          						  </tbody>
          						</table>
                  	</div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection