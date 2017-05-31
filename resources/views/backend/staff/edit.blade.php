@extends('backend.master')
@section('content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{ route('admin.dashboard') }}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Edit Staff</a></li>
</ul>
<div class="clearfix"></div>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-edit"></i><span class="break"></span>Edit Staff</h2>
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
						  <input class="input-xlarge focused" name="name" id="focusedInput" type="text" value="{{ old('name',isset($admin)?$admin['name'] : null) }}" required >
						</div>
					 </div>
					 <div class="control-group">
						<label class="control-label" for="focusedInput">Email</label>
						<div class="controls">
						  <input class="input-xlarge focused" name="email"  id="focusedInput" type="email" value="{{ old('name',isset($admin)?$admin['email'] : null) }}" required>
						</div>
					 </div>
					 <div class="control-group">
						<label class="control-label" for="focusedInput">Address</label>
						<div class="controls">
						  <input class="input-xlarge focused" name="address" id="focusedInput" type="text" value="{{ old('name',isset($admin)?$admin['address'] : null) }}" required>
						</div>
					 </div>
					 <div class="control-group">
						<label class="control-label" for="focusedInput">Phone</label>
						<div class="controls">
						  <input class="input-xlarge focused"  name="phone" id="focusedInput" type="text" value="{{ old('name',isset($admin)?$admin['phone'] : null) }}" required>
						</div>
					 </div>
						<div class="control-group">
							<label class="control-label" for="selectError3">Status</label>
							<div class="controls">
							  <select id="selectError3" name="status" >
								 {!! $status !!}
								
							  </select>
							</div>
						  </div>
					  <div class="control-group">
						<label class="control-label" for="selectError3">Role</label>
						<div class="controls">
						  <select id="selectError3" name="role" >
							 {!! $option !!}
						  </select>
						</div>
					  </div>
					  
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection()