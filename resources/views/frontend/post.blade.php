@extends('frontend.master')
@section('content')
		<div id="content">
			<div class="container">
				<ol class="breadcrumb">
				  <li><a href="{{ asset('/') }}">Home</a></li>
				  <li><a href="{{ asset('/') }}{!! $cate_slug !!}">{!! $category !!}</a></li>
				  <li class="active">{!! $name_topic !!}</li>
				</ol>

				<div class="detail">
					{!! $topic !!}
				</div>

				<div class="comment">
					<h2>{!! $count_comment !!} Comment</h2>
					
					{!! $listcomment !!}

					<form role="form" action="" method="POST" >
					{{ csrf_field() }}
					{!! $commentform !!}
					</form>
				</div>
				
			</div>
		</div>
@endsection()