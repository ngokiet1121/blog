@extends('frontend.master')
@section('content')
		<div id="content">
			<div class="post-filters">
				<div class="container">
					<ul class="nav nav-pills">
						<li  ><a class="hvr-underline-from-left" href="#">New Post</a></li>
						<li><a class="hvr-underline-from-left" href="#">Top View</a></li>
						<li><a class="hvr-underline-from-left" href="#">Top Comment</a></li>
					</ul>
				</div>
			</div>
			<div class="post-item">
				<div class="container">
					<div class="row">
					<!--left-content-->
						<div id="left-content" class="col-md-9">
							<!--item-->
							<div class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="resources/views/img/1484746396download.jpg" alt="...">
								</a>
								<div class="media-body">
									<h5><a href="#">Tên người đăng</a> 08/08/2016 </h5>
									<h4 class="media-heading"><a href="">Name Post</a></h4><br/>
									<span class="score" data-toggle="tooltip" data-placement="bottom" title="Views!" ><i class="fa fa-eye">2000</i></span>
									<span class="score" data-toggle="tooltip" data-placement="bottom" title="Comments!" ><i class="fa fa-comments">2000</i></span>
								</div>
							</div>
							<div class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="resources/views/img/1484746396download.jpg" alt="...">
								</a>
								<div class="media-body">
									<h5><a href="#">Tên người đăng</a> 08/08/2016 </h5>
									<h4 class="media-heading"><a href="">Name Post</a></h4><br/>
									<span class="score" data-toggle="tooltip" data-placement="bottom" title="Views!" ><i class="fa fa-eye">2000</i></span>
									<span class="score" data-toggle="tooltip" data-placement="bottom" title="Comments!" ><i class="fa fa-comments">2000</i></span>
								</div>
							</div>
							<div class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="resources/views/img/1484746396download.jpg" alt="...">
								</a>
								<div class="media-body">
									<h5><a href="#">Tên người đăng</a> 08/08/2016 </h5>
									<h4 class="media-heading"><a href="">Name Post</a></h4><br/>
									<span class="score" data-toggle="tooltip" data-placement="bottom" title="Views!" ><i class="fa fa-eye">2000</i></span>
									<span class="score" data-toggle="tooltip" data-placement="bottom" title="Comments!" ><i class="fa fa-comments">2000</i></span>
								</div>
							</div>
							<div class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="resources/views/img/1484746396download.jpg" alt="...">
								</a>
								<div class="media-body">
									<h5><a href="#">Tên người đăng</a> 08/08/2016 </h5>
									<h4 class="media-heading"><a href="">Name Post</a></h4><br/>
									<span class="score" data-toggle="tooltip" data-placement="bottom" title="Views!" ><i class="fa fa-eye">2000</i></span>
									<span class="score" data-toggle="tooltip" data-placement="bottom" title="Comments!" ><i class="fa fa-comments">2000</i></span>
								</div>
							</div>
							<div class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="resources/views/img/1484746396download.jpg" alt="...">
								</a>
								<div class="media-body">
									<h5><a href="#">Tên người đăng</a> 08/08/2016 </h5>
									<h4 class="media-heading"><a href="">Name Post</a></h4><br/>
									<span class="score" data-toggle="tooltip" data-placement="bottom" title="Views!" ><i class="fa fa-eye">2000</i></span>
									<span class="score" data-toggle="tooltip" data-placement="bottom" title="Comments!" ><i class="fa fa-comments">2000</i></span>
								</div>
							</div>
							<!-- end item-->

							<!--pagination-->
							<ul class="pagination pull-right">
								<li><a href="#">&laquo;</a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">&raquo;</a></li>
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