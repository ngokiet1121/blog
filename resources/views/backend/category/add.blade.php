@extends('backend.master')
@section('content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{ route('admin.dashboard') }}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Add Category</a></li>
</ul>
<div class="clearfix"></div>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-plus"></i><span class="break"></span>Add Category</h2>
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
						  <input class="input-xlarge focused" name="name" id="focusedInput" type="text" required>
						</div>
					 </div>
					 <div class="control-group">
						<label class="control-label" for="focusedInput">Image</label>
						<div class="controls">
						<input type="file" class="input-xlarge focused" id="fuImage" name="fuImage" accept="image/*">
						</div>
					 </div>
					 <div class="control-group">
						<div class="controls">
						
						<div id="image-holder" {{-- style="margin-left: 180px;" --}} class="col-sm-2">
						</div>
						</div>
					</div>
					 <div class="control-group">
						<label class="control-label" for="focusedInput">Content</label>
						<div class="controls">
						  <input class="input-xlarge focused" name="content" id="focusedInput" type="text" required>
						</div>
					 </div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection()