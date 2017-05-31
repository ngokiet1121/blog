@extends('backend.master')
@section('content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{ route('admin.dashboard') }}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">View Post</a></li>
</ul>
<div class="clearfix"></div>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-plus"></i><span class="break"></span>View Post</h2>
			<div class="box-icon">
				
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="focusedInput">Name</label>
						<div class="controls">
						  <input class="input-xlarge focused" name="name" id="focusedInput" type="text" value="{!! $post['name']!!}" readonly>
						</div>
					 </div>
					<div class="control-group">
						<label class="control-label" for="selectError3">Category</label>
						<div class="controls">
						 <input class="input-xlarge focused" name="name" id="focusedInput" type="text" value="{!! $category !!}" readonly>
						 
						</div>
					  </div>
					 <div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Content</label>
					  <div class="controls">
						{!! $post['description'] !!}
					  </div>
					</div>

					<div class="form-actions">
						<a href="{{ route('admin.post.getEdit',$post['id']) }}" type="submit" class="btn btn-primary">Edit</a>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection()