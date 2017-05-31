@extends('backend.master')
@section('content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{ route('admin.dashboard') }}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Edit Post</a></li>
</ul>
<div class="clearfix"></div>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-plus"></i><span class="break"></span>Edit Post</h2>
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
						  <input class="input-xlarge focused" name="name" id="focusedInput" type="text" value="{{ old('name',isset($post)?$post['name'] : null) }}" required>
						</div>
					 </div>
					<div class="control-group">
						<label class="control-label" for="selectError3">Category</label>
						<div class="controls">
						  <select id="selectError3" name="category" required >
							 {!! $option !!}
						  </select>
						</div>
					  </div>
					 <div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Content</label>
					  <div class="controls">
						<textarea  name="description" id="editor1" cols="50" rows="4">{{ old('name',isset($post)?$post['description'] : null) }}</textarea>
						<script type="text/javascript">CKEDITOR.replace('editor1'); </script>
					  </div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save Changes</button>
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection()