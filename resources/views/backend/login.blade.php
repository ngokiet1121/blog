<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{ asset('public/admin/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/admin/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
	<link id="base-style" href="{{ asset('public/admin/css/style.css') }}" rel="stylesheet">
	<link id="base-style-responsive" href="{{ asset('public/admin/css/style-responsive.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('public/admin/font-awesome/css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/font-awesome/css/font-awesome.min.css') }}">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
</head>
<body>
	<div class="container-fluid-full">
		<div class="row-fluid">

			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="index.html"><i class="fa fa-home"></i></a>
						<a href="#"><i class="fa fa-cog"></i></a>
					</div>
					<h2>Login to your account</h2>
					<form class="form-horizontal" action="{{ route('admin') }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="fa fa-user"></i></span>
								<input class="input-large span10" name="email" id="username" type="email" placeholder="type email" required />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="fa fa-lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="type password" required/>
							</div>
							<div class="clearfix"></div>
							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
						</form>
						<hr>
						<h3>Forgot Password?</h3>
						<p>
							No problem, <a href="#">click here</a> to get a new password.
						</p>	
					</div><!--/span-->
				</div><!--/row-->


			</div><!--/.fluid-container-->


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
