@extends('frontend.layouts.app')
@section('content')

<section id="main-img">
	<div class="container">
		<div class="row">
			<div class="col-md-12 main-img-content text-center">
				<h2>Book with us and Be Safe for your Spot</h2>
				<p>We help booking the seats and spots for all kinds of shows and concerts like Comedy Circle Shows , Singing Concert , Dance Concerts , Foreign Shows and others . We provide the best service for our users with the simple and clean ui of our websites as well as secured list of payments like paypal payment as well as on field payment system and without any other extra fee or seller commision . With all these features users will feels safe with our website</p>

				<form action="{{ route('frontend.showsandprograms') }}" method="GET">
					<input type="text" value="{{ old('search') }}" name="search" placeholder="Enter the name of show , location , performer etc" class="form-control mb-2" style="text-align: center; height: 50px;">
					<button type="submit" class="btn btn-lg btn-block btn-primary">Search</button>
				</form>
			</div>
		</div>
	</div>
</section>

<section class="social-box">
    <div class="container">
     	<div class="row">
			 
			    <div class="col-lg-4 col-xs-12 text-center">
					<div class="box">
                        <i class="fa fa-behance fa-3x" aria-hidden="true"></i>
						<div class="box-title">
							<h3>Behance</h3>
						</div>
						<div class="box-text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-xs-12  text-center">
					<div class="box">
					    <i class="fa fa-twitter fa-3x" aria-hidden="true"></i>
						<div class="box-title">
							<h3>Twitter</h3>
						</div>
						<div class="box-text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-xs-12 text-center">
					<div class="box">
                        <i class="fa fa-facebook fa-3x" aria-hidden="true"></i>
						<div class="box-title">
							<h3>Facebook</h3>
						</div>
						<div class="box-text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>	 
				
				<div class="col-lg-4 col-xs-12 text-center">
					<div class="box">
                        <i class="fa fa-pinterest-p fa-3x" aria-hidden="true"></i>
						<div class="box-title">
							<h3>Pinterest</h3>
						</div>
						<div class="box-text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-xs-12 text-center">
					<div class="box">
					    <i class="fa fa-google-plus fa-3x" aria-hidden="true"></i>
						<div class="box-title">
							<h3>Google</h3>
						</div>
						<div class="box-text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-xs-12 text-center">
					<div class="box">
                        <i class="fa fa-github fa-3x" aria-hidden="true"></i>
						<div class="box-title">
							<h3>Github</h3>
						</div>
						<div class="box-text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>
						<div class="box-btn">
						    <a href="#">Learn More</a>
						</div>
					 </div>
				</div>
		
		</div>		
    </div>
</section>

@endsection