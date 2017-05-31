@extends('backend.master')

@section('content')
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{ route('admin.dashboard') }}">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">List Category</a></li>
	</ul>
	<div class="clearfix"></div>
	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="fa fa-user"></i><span class="break"></span>Members</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Name</th>
								  <th>Image</th>
								  <th>Content</th>
								  <th>Admin</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							{!! $listCategory !!}
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div>
			{!! $modal !!}
@endsection()