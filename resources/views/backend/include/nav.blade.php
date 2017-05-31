<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li><a href="{{ asset('admin') }}"><i class="fa fa-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
			<li>
				<a class="dropmenu" href="#"><i class="fa fa-users"></i><span class="hidden-tablet"> Users </span><span class="label label-important"></span></a>
				<ul>
					<li><a href="{{ route('admin.user.getList') }}" class="submenu" ><i class="icon-file-alt"></i><span class="hidden-tablet">List </span></a></li>
				
				</ul>	
			</li>
			<li>
				<a class="dropmenu" href="#"><i class="fa fa-clipboard"></i><span class="hidden-tablet"> Categories</span><span class="label label-important"></span></a>
				<ul>
					<li><a href="{{ route('admin.category.getList') }}" class="submenu" ><i class="icon-file-alt"></i><span class="hidden-tablet">List </span></a></li>
					<li><a href="{{ route('admin.category.getAdd') }}" class="submenu" ><i class="icon-file-alt"></i><span class="hidden-tablet">Add</span></a></li>
				</ul>	
			</li>
			<li>
				<a class="dropmenu" href="#"><i class="fa fa-dropbox"></i><span class="hidden-tablet"> Posts </span><span class="label label-important"></span></a>
				<ul>
					<li><a href="{{ route('admin.post.getList') }}" class="submenu" ><i class="icon-file-alt"></i><span class="hidden-tablet">List </span></a></li>
					<li><a href="{{ route('admin.post.getAdd') }}" class="submenu"><i class="icon-file-alt"></i><span class="hidden-tablet">Add</span></a></li>
				</ul>
			</li>
			<li>
				<a class="dropmenu" href="#"><i class="fa fa-comments-o"></i><span class="hidden-tablet"> Comments</span><span class="label label-important"></span></a>
				<ul>
					<li><a href="{{ route('admin.comment.getList') }}" class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet">List </span></a></li>
				</ul>	
			</li>
			<li>
				<a class="dropmenu" href="#"><i class="fa fa-users"></i><span class="hidden-tablet"> Staff </span><span class="label label-important"></span></a>
				<ul>
				<li><a href="{{ route('admin.staff.getList') }}" class="submenu" ><i class="icon-file-alt"></i><span class="hidden-tablet">List Staff</span></a></li>
				<li><a href="{{ route('admin.staff.getAdd') }}" class="submenu" ><i class="icon-file-alt"></i><span class="hidden-tablet">Add Staff</span></a></li>
				</ul>	
			</li>
		</ul>
	</div>
</div>