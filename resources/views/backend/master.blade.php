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

			</div>
		</div>	
	</div>	
	<footer>
		<p>
			<span style="text-align:left;float:left">&copy; 2013 JANUX Responsive Dashboard</a></span>

		</p>
	</footer>
	<!-- start: JavaScript-->
	<script src="{{ asset('public/admin/js/jquery-1.9.1.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery-migrate-1.0.0.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery-ui-1.10.0.custom.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.ui.touch-punch.js') }}"></script>
	<script src="{{ asset('public/admin/js/modernizr.js') }}"></script>
	<script src="{{ asset('public/admin/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.cookie.js') }}"></script>
	<script src="{{ asset('public/admin/js/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.dataTables.min.js') }}"]]"></script>
	<script src="{{ asset('public/admin/js/excanvas.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.flot.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.flot.pie.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.flot.stack.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.flot.resize.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.chosen.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.uniform.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.cleditor.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.noty.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.elfinder.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.raty.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.iphone.toggle.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.uploadify-3.1.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.gritter.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.imagesloaded.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.masonry.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.knob.modified.js') }}"></script>
	<script src="{{ asset('public/admin/js/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('public/admin/js/counter.js') }}"></script>
	<script src="{{ asset('public/admin/js/retina.js') }}"></script>
	<script src="{{ asset('public/admin/js/custom.js') }}"></script>
	<!-- end: JavaScript-->

</body>
</html>
