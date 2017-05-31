@extends('frontend.master')
@section('content')
		<div id="content">
			<div class="post-filters">
				<div class="container">
					<ul class="nav nav-pills">
						<li  ><a class="hvr-underline-from-left" href="{{ asset('new-post') }}">New Post</a></li>
						<li><a class="hvr-underline-from-left" href="{{ asset('top-view') }}">Top View</a></li>
						<li><a class="hvr-underline-from-left" href="top-comment">Top Comment</a></li>
					</ul>
				</div>
			</div>
			<div class="post-item">
				<div class="container">
					<div class="row">
					<!--left-content-->
						<div id="left-content" class="col-md-9">
							<!--item-->
							{!! $list !!}
							<!-- end item-->
							<!--pagination-->
							<ul class="pagination pull-right">

							</ul>
							<!--end pagination-->
						</div>
						<!--end left-content-->
						<!--right-content-->
						<div class="right-content">

						</div>
						<!--end right-content-->
					</div>
				</div>
			</div>
		</div>
@endsection()