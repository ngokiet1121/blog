@extends('backend.master')
@section('content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{ route('admin.dashboard') }}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Add Staff</a></li>
</ul>
<div class="clearfix"></div>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-plus"></i><span class="break"></span>Add Staff</h2>
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
						<label class="control-label" for="focusedInput">Email</label>
						<div class="controls">
						  <input class="input-xlarge focused" name="email"  id="focusedInput" type="email" required>
						</div>
					 </div>
					 <div class="control-group">
						<label class="control-label" for="focusedInput">Password</label>
						<div class="controls">
						  <input class="input-xlarge focused" name="password" id="focusedInput" type="password" required>
						</div>
					 </div>
					 <div class="control-group">
						<label class="control-label" for="focusedInput">Re-Password</label>
						<div class="controls">
						  <input class="input-xlarge focused" name="re-password" id="focusedInput" type="password" required>
						</div>
					 </div>
					 <div class="control-group">
						<label class="control-label" for="focusedInput">Address</label>
						<div class="controls">
						  <input class="input-xlarge focused" name="address" id="focusedInput" type="text" required>
						</div>
					 </div>
					 <div class="control-group">
						<label class="control-label" for="focusedInput">Phone</label>
						<div class="controls">
						  <input class="input-xlarge focused" name="phone" id="focusedInput" type="text" required>
						</div>
					 </div>
						<div class="control-group">
							<label class="control-label" for="selectError3">Status</label>
							<div class="controls">
							  <select id="selectError3" name="status" >
								<option >----Status----</option>
								<option value="1" >----Active----</option>
								<option value="2" >----Banned----</option>
								<option value="3" >----Pending----</option>
								<option value="4" >----Inactive----</option>
							  </select>
							</div>
						  </div>
					  <div class="control-group">
						<label class="control-label" for="selectError3">Role</label>
						<div class="controls">
						  <select id="selectError3" name="role" >
						  	<option value="">Role</option>
							 {!! $listrole !!}
						  </select>
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