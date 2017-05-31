<!DOCTYPE html>
<html lang="en">
<head>
	@include('backend.include.head')
</head>
<body>
<!-- start: Header -->
@include('backend.include.header')
	<!-- start: Header -->
	<div class="container-fluid-full">
		<div class="row-fluid">
			<!-- start: Main Menu -->
			@include('backend.include.nav')
			<!-- end: Main Menu -->
			<!-- start: Content -->
			<div id="content" class="span10">
				
				@yield('content')
				@include('backend.include.message')	
			</div>
		</div>	
	</div>	
	<footer>
		<p>
			<span style="text-align:left;float:left">&copy; 2013 JANUX Responsive Dashboard</a></span>

		</p>
	</footer>
	<!-- start: JavaScript-->
	@include('backend.include.scripts')	
	

	<!-- end: JavaScript-->

</body>
</html>
