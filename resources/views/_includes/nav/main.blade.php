		<nav class="navbar has-shadow is-white" role="navigation" aria-label="main navigation">
    		<div class="container">
			  	<div class="navbar-brand">
			    	<a class="navbar-item" href="{{ url('/') }}">
			      		<img src="{{ asset('images/logo.png') }}">
			    	</a>

			    	<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
				      	<span aria-hidden="true"></span>
				      	<span aria-hidden="true"></span>
				      	<span aria-hidden="true"></span>
			    	</a>
			  	</div>

			  	<div id="navbarBasicExample" class="navbar-menu">
			    	<div class="navbar-start">
				      	<a href="#" class="navbar-item is-tab is-hidden-mobile">
				        	Learn
				      	</a>

				      	<a href="#" class="navbar-item is-tab is-hidden-mobile">
				        	Discuss
				      	</a>

				      	<a href="#" class="navbar-item is-tab is-hidden-mobile">
				        	Share
				      	</a>
				    </div>

				    <div class="navbar-end">
			      		@if (Auth::guest())
			      			<div class="buttons">
				          		<a href="{{ route('login') }}" class="button is-light">
				            		Log in
				          		</a>
				          		<a href="{{ route('register') }}" class="button is-primary">
				            		<strong>Join the Community</strong>
				          		</a>
				        	</div>
			      		@else
					      	<div class="navbar-item">
				      			<div class="navbar-item has-dropdown is-hoverable">
						        	<a class="navbar-link">
						          		<i class="fa fa-fw m-r-10 fa-user-circle-o"></i> Hey {{ Auth::user()->name }}
						        	</a>

						        	<div class="navbar-dropdown">
							          	<a class="navbar-item">
							            	<i class="fa fa-fw m-r-10 fa-user"></i>Profile
							          	</a>
						          		<a class="navbar-item">
						            		<i class="fa fa-fw m-r-10 fa-bell"></i>Notifications
						          		</a>
						          		<a class="navbar-item" href="{{ route('manage.dashboard') }}">
						            		<i class="fa fa-fw m-r-10 fa-cog"></i>Manage
						          		</a>
						          		<hr class="navbar-divider">
                
						          		<a class="navbar-item" href="{{ route('logout') }}" onclick="
							                event.preventDefault();
							                document.getElementById('logout-form').submit();">

							                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							                    @csrf
							                </form>

						            		<i class="fa fa-fw m-r-10 fa-sign-out"></i>Logout</a>
						          		</a>
						        	</div>
						      	</div>
					      	</div>
			      		@endif
				    </div>
			  	</div>
			</div>
		</nav>