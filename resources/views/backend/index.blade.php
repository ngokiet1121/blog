@extends('backend.master')
@section('content')
<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{ route('admin.dashboard') }}">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Dashboard</a></li>
	</ul>

	<div class="clearfix"></div>
@endsection()