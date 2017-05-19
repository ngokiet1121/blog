<!DOCTYPE html>
<html lang="en">
<head>
	@include('frontend.include.head')
</head>
<body>
	<div id="app">
	<!--Header-->
		@include('frontend.include.header')
		<!--End Header-->
		<!--Welcome-->
		@include('frontend.include.welcome')
		<!--End Welcome-->
		<!--Content-->
		@yield('content')
		<!--End Content-->
		<!--footer-->
		@include('frontend.include.footer')
		<!--End footer-->
	</div>
	<!--Script-->
	@include('frontend.include.script')
	<!-- End Script-->
</body>
</html>