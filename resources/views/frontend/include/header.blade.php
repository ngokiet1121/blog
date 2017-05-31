<div id="header">
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ asset('/') }}">Blog</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ asset('/') }}">Posts</a></li>
					<li><a href="{{ asset('loai-bai-viet') }}">Categories</a></li>
				</ul>
				<form class="navbar-form navbar-right" role="search">

					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div><!-- /input-group -->

				</form>
				@php
					$user = Auth::guard('web')->user();
				@endphp
				<ul class="nav navbar-nav navbar-right">
					<li>
						@if ($user["name"] == null)
							<a  href="http://blogk.com.vn/login"><i class="fa fa-lock"></i> Sign In</a>
						@else
							{{-- <a href=""></i></a> --}}

							<a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
 								<i class="fa fa-lock"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            <a href="">{!! $user['name'] !!}</a> 
						@endif
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>

<!-- Modal -->
