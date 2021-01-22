<section id="top-nav" class="bg-dark">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-4 pb-4">
		  <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 30px;">
	    	<span>book</span><span style="color: red;">M</span><span style="color: orangered;">e</span>
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="{{ url('/shows-and-programs') }}">SHOWS AND PROGRAMS<span class="sr-only">(current)</span></a>
		      </li>
		      @auth
		      <li class="nav-item">
		        <a class="nav-link" href="{{ route('frontend.account') }}">MY ACCOUNT</a>
		      </li>
		      @else
		      <li class="nav-item">
		        <a class="nav-link" href="{{ url('/login') }}">LOGIN</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link btn btn-success" href="{{ url('/register') }}">REGISTER</a>
		      </li>
		      @endauth
		    </ul>
		  </div>
		</nav>
	</div>
</section>