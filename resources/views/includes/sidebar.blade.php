
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
	<!-- Sidebar user panel -->
	<div class="user-panel">
		<div class="pull-left image">
			<img src="{!! Session::get('profile_pic')!!}" class="img-circle" width="45"alt="User Image" />
		</div>
		<div class="pull-left info">
			<p>Hello, 
				@if(Session::has('first_name'))
					{!!Session::get('first_name')!!}
				@else
					Guest
				@endif
			</p>
			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
		<!-- @if(Session::get('in_time')==1)
		<div class="text-center">
		<a href="#"><button class="btn btn-md btn-danger" id="comment"><i class="fa fa-sign-in"></i> Punch In</button></a>
		</div>
		@endif -->
	</div>
	
	<!-- search form -->
	<!-- <form action="#" method="get" class="sidebar-form">
		<div class="input-group">
			<input type="text" name="q" class="form-control" placeholder="Search..."/>
			<span class="input-group-btn">
				<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
			</span>
		</div>
	</form> -->
	<!-- /.search form -->
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu">
		@if(Session::get('in_time')==1)
		<div class="text-center">
		<a href="#"><button class="btn btn-md btn-danger" id="comment"><i class="fa fa-sign-in"></i> Punch In</button></a>
		</div>
		@endif
		<li class="<?= ( stripos(Request::url(), 'dashboard')!== false) ? "active" : "" ?>">
			<a href="{!!URL::to('dashboard')!!}">
				<i class="fa fa-dashboard"></i> <span id="dash">Dashboard</span>
			</a>
		</li>
		@if(Auth::user()->role->name=='superadmin')
		<li class="treeview <?= ( stripos(Request::url(), 'company')!== false) ? "active" : "" ?>">
			<a href="#">
				<i class="fa fa-simplybuilt"></i>
				<span>Companies</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="{!!URL::to('company/create')!!}"><i class="fa fa-angle-double-right"></i>Add New Company</a></li>
				<li><a href="{!!URL::to('company')!!}"><i class="fa fa-angle-double-right"></i>Manage Companies</a></li>
				
			</ul>
		</li>
		@endif
		@if((Auth::user()->role->name)=='admin'||Auth::user()->role->name=='superadmin')
		<li class="treeview <?= ( stripos(Request::url(), 'attendance')!== false) ? "active" : "" ?>">
			<a href="#">
				<i class="fa fa-file-archive-o"></i>
				<span>Attendances</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="{!!URL::to('attendance')!!}"><i class="fa fa-angle-double-right"></i>Attendance</a></li>
				<li><a href="{!!URL::to('attendance/attendance-report')!!}"><i class="fa fa-angle-double-right"></i>Generate Report</a></li>
			</ul>
		</li>
		<li class="treeview <?= ( stripos(Request::url(), 'user')!== false) ? "active" : "" ?>">
			<a href="#">
				<i class="fa fa-user"></i>
				<span>Users</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="{!!URL::to('user/createuser')!!}"><i class="fa fa-angle-double-right"></i>Add New User</a></li>
				<li><a href="{!!URL::to('user')!!}"><i class="fa fa-angle-double-right"></i>Manage Users</a></li>
				
			</ul>
		</li>
		<li class="treeview <?= ( stripos(Request::url(), 'holiday')!== false) ? "active" : "" ?>">
			<a href="#">
				<i class="fa fa-bar-chart-o"></i>
				<span>Holidays</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="{!!URL::to('holiday/create')!!}"><i class="fa fa-angle-double-right"></i>Add New Holiday</a></li>
				<li><a href="{!!URL::to('holiday')!!}"><i class="fa fa-angle-double-right"></i>Manage Holidays</a></li>

				<!-- <li><a href="#"><i class="fa fa-angle-double-right"></i>Manage Weekend</a></li>
				<li><a href="#"><i class="fa fa-angle-double-right"></i>Manage Public Holiday</a></li> -->
				
			</ul>
		</li>
		<li class="treeview <?= ( stripos(Request::url(), 'leave')!== false) ? "active" : "" ?>">
			<a href="#">
				<i class="fa fa-pencil"></i>
				<span>Leaves</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="{!!URL::to('leave/leave-request')!!}"><i class="fa fa-angle-double-right"></i>Leave Request</a></li>
				<li><a href="{!!URL::to('leave')!!}"><i class="fa fa-angle-double-right"></i>Manage Personal Leaves</a></li>
			</ul>
		</li>
		<li class="<?= ( stripos(Request::url(), 'company')!== false) ? "active" : "" ?>">
			<a href="{!!URL::to('company/settings')!!}">
				<i class="fa fa-simplybuilt"></i> <span>Company Settings</span>
			</a>
		</li>
		<li class="<?= ( stripos(Request::url(), 'office')!== false) ? "active" : "" ?>">
			<a href="{!!URL::to('office')!!}">
				<i class="fa fa-clock-o"></i> <span>Set Office Time</span>
			</a>
		</li>

		<li class="treeview <?= ( stripos(Request::url(), 'transaction')!== false) ? "active" : "" ?>">
			<a href="#">
				<i class="fa fa-simplybuilt"></i>
				<span>Transaction Heads</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="{!!URL::to('transaction/create')!!}"><i class="fa fa-angle-double-right"></i>Add New Transaction Head</a></li>
				<li><a href="{!!URL::to('transaction')!!}"><i class="fa fa-angle-double-right"></i>Manage Transaction Heads</a></li>
				
			</ul>
		</li>
		
		@else
		<li class="<?= ( stripos(Request::url(), 'attendance')!== false) ? "active" : "" ?>">
			<a href="{!!URL::to('attendance')!!}">
				<i class="fa fa-clock-o"></i> <span>Attendances</span>
			</a>
		</li>
		<li>
			<a href="{!!URL::to('leave/leave-request')!!}">
				<i class="fa fa-pencil"></i> <span>Leave Request</span>
			</a>
		</li>
		<li>
			<a href="{!!URL::to('holiday')!!}">
				<i class="fa fa-bar-chart-o"></i> <span>Holiday Calendar</span>
			</a>
		</li>
		@endif
		
		<!-- <li>
			<a href="../widgets.html">
				<i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
			</a>
		</li>-->
		
		<!--<li class="treeview">
			<a href="#">
				<i class="fa fa-laptop"></i>
				<span>UI Elements</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="../UI/general.html"><i class="fa fa-angle-double-right"></i> General</a></li>
				<li><a href="../UI/icons.html"><i class="fa fa-angle-double-right"></i> Icons</a></li>
				<li><a href="../UI/buttons.html"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
				<li><a href="../UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
				<li><a href="../UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
			</ul>
		</li>
		<li class="treeview active">
			<a href="#">
				<i class="fa fa-edit"></i> <span>Forms</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li class="active"><a href="general.html"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
				<li><a href="advanced.html"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
				<li><a href="editors.html"><i class="fa fa-angle-double-right"></i> Editors</a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-table"></i> <span>Tables</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="../tables/simple.html"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
				<li><a href="../tables/data.html"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
			</ul>
		</li>
		<li>
			<a href="../calendar.html">
				<i class="fa fa-calendar"></i> <span>Calendar</span>
				<small class="badge pull-right bg-red">3</small>
			</a>
		</li>
		<li>
			<a href="../mailbox.html">
				<i class="fa fa-envelope"></i> <span>Mailbox</span>
				<small class="badge pull-right bg-yellow">12</small>
			</a>
		</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-folder"></i> <span>Examples</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li><a href="../examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
				<li><a href="../examples/login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
				<li><a href="../examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
				<li><a href="../examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
				<li><a href="../examples/404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
				<li><a href="../examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
				<li><a href="../examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
			</ul>
		</li> -->
	</ul>
</section>
<!-- /.sidebar -->