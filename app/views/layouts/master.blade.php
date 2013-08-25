<!DOCTYPE html>
<html lang="en">
	<header>
		<title>@yield('section', 'Get Certified')</title>
		<meta name="description" content="">
    	<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
		<link href="http://{{$_SERVER['SERVER_NAME']}}/stylesheet.css" rel="stylesheet">
	</header>
    <body>
	    <div class="container">
	    	<!-- Static navbar -->
	    	<div class="navbar navbar-default">
		        <div class="navbar-header">
		        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            	<span class="icon-bar"></span>
		            	<span class="icon-bar"></span>
		            	<span class="icon-bar"></span>
		          	</button>
		          	<a class="navbar-brand" href="{{URL::route('home')}}">Get Certified</a>
		        </div>
		        <div class="navbar-collapse collapse">
		          	<ul class="nav navbar-nav">
		            	<li {{ Request::is('providers') ? ' class="active"' : '' }}><a href="{{URL::route('providers')}}">Providers</a></li>
		            	<li {{ Request::is('certifications') ? ' class="active"' : '' }}><a href="{{URL::route('certifications')}}">Certifications</a></li>
		            	<li {{ Request::is('exams') ? ' class="active"' : '' }}><a href="{{URL::route('exams')}}">Exams</a></li>
		          	</ul>
		          	<ul class="nav navbar-nav navbar-right">
		            	<li {{ Request::is('about-us') ? ' class="active"' : '' }}><a href="{{URL::route('about-us')}}">About us</a></li>
		            	<li {{ Request::is('contact-us') ? ' class="active"' : '' }}><a href="{{URL::route('contact-us')}}">Contact us</a></li>
		          	</ul>
		        </div><!--/.nav-collapse -->
		    </div>

		    <!-- Main component for a primary marketing message or call to action -->
	      	<div class="jumbotron">
	        	@yield('content')
	      	</div>
	    </div> <!-- /container -->
    	<script src="//code.jquery.com/jquery.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    </body>
</html>