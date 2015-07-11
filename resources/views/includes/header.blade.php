	<a href="{!!URL::to('dashboard')!!}" class="logo">
		<!-- Add the class icon to your logo image or logo icon to add the margining -->
	
		{!!Session::get('company_name')!!}
			
	</a>
	<!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" style = "padding:10px 0" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{!! Session::get('profile_pic')!!}"  class="img-circle" width="30" alt="User Image" />
                  <!-- <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"/> -->
                  <span class="hidden-xs">{!! Session::get('first_name') !!} {!! Session::get('last_name') !!}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                      <img src="{!! Session::get('profile_pic')!!}"  class="img-circle"  alt="User Image" />
                    <!-- <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" /> -->
                    <p>
					@if(Session::has('first_name'))
						{!!Session::get('first_name')!!} - {!!Auth::user()->employee->designation->title!!}
					@else
						Guest
					@endif
					<small>Member since {!! date('M. Y', strtotime(Auth::user()->created_at)) !!}</small>
					<small>Last Login {!! date('d M, Y @ h:i:s a', strtotime(Auth::user()->lastlogin)) !!}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{!!URL::to('user/userprofile')!!}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{URL::to('auth/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
	
	
	
	
	
	
	
	
	
	
	
	
	<?php /*
	
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<!-- Messages: style can be found in dropdown.less-->
				@if(isset($application) && Session::get('application_number') !=0)
				 <li class="dropdown messages-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="label label-success">{!!Session::get('application_number')!!}</span>
					</a> 
					 <ul class="dropdown-menu">
						<li class="header">There are {!!Session::get('application_number')!!} leave application(s)</li>
						<li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">
								{!!$application!!}
							</ul>
						</li>
						<li class="footer"><a href="#">See All Messages</a></li>
					</ul>  
				 </li> 
				 @endif
				<!-- Notifications: style can be found in dropdown.less -->
				<!-- <li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-warning"></i>
						<span class="label label-warning">10</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">You have 10 notifications</li>
						<li>
							<!-- inner menu: contains the actual data -->
							<!-- <ul class="menu">
								<li>
									<a href="#">
										<i class="ion ion-ios7-people info"></i> 5 new members joined today
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-users warning"></i> 5 new members joined
									</a>
								</li>

								<li>
									<a href="#">
										<i class="ion ion-ios7-cart success"></i> 25 sales made
									</a>
								</li>
								<li>
									<a href="#">
										<i class="ion ion-ios7-person danger"></i> You changed your username
									</a>
								</li>
							</ul>
						</li>
						<li class="footer"><a href="#">View all</a></li>
					</ul>
				</li> --> 
				<!-- Tasks: style can be found in dropdown.less -->
				<!-- <li class="dropdown tasks-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-tasks"></i>
						<span class="label label-danger">9</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">You have 9 tasks</li>
						<li> -->
							<!-- inner menu: contains the actual data -->
							<!-- <ul class="menu">
								<li>Task item
									<a href="#"> -->
										<!-- <h3>
											Design some buttons
											<small class="pull-right">20%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">20% Complete</span>
											</div>
										</div>
									</a> -->
								<!-- </li><!-- end task item -->
								<!-- <li>Task item  -->
									<!-- <a href="#">
										<h3>
											Create a nice theme
											<small class="pull-right">40%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">40% Complete</span>
											</div>
										</div>
									</a> -->
								<!-- </li><!-- end task item -->
								<!-- <li>Task item --> 
									<!-- <a href="#">
										<h3>
											Some task I need to do
											<small class="pull-right">60%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">60% Complete</span>
											</div>
										</div>
									</a> -->
								<!-- </li><!-- end task item -->
							<!-- 	<li>Task item  -->
									<!-- <a href="#">
										<h3>
											Make beautiful transitions
											<small class="pull-right">80%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">80% Complete</span>
											</div>
										</div>
									</a>
								</li>end task item -->
					<!-- 		</ul>
						</li>
						<li class="footer">
							<a href="#">View all tasks</a>
						</li>
					</ul>
				</li> -->
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
						<span>@if(Session::has('first_name'))
									{!!Session::get('first_name')!!}<?=" "?>{!!Session::get('last_name')!!}
								@else
									Guest
								@endif
							<i class="caret"></i></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header bg-light-blue">
							<img src="{!! Session::get('profile_pic')!!}"  class="img-circle"  alt="User Image" />
							<p>
								@if(Session::has('first_name'))
									{!!Session::get('first_name')!!}<?="-"?>{!!Auth::user()->employee->designation->title!!}
								@else
									Guest
								@endif
								<small>Member since {!! date('M. Y', strtotime(Auth::user()->created_at)) !!}</small>
								<small>Last Login {!! date('d M, Y @ h:i:s a', strtotime(Auth::user()->lastlogin)) !!}</small>
							</p>
						</li>
						<!-- Menu Body -->
						<!-- <li class="user-body">
							<div class="col-xs-4 text-center">
								<a href="#">Followers</a>
							</div>
							<div class="col-xs-4 text-center">
								<a href="#">Sales</a>
							</div>
							<div class="col-xs-4 text-center">
								<a href="#">Friends</a>
							</div>
						</li> -->
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="{!!URL::to('user/userprofile')!!}" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="{{URL::to('auth/logout')}}" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
*/	?>