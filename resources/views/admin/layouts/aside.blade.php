<aside class="control-sidebar control-sidebar-dark sidebar-dark-primary elevation-4">
	<div class="sidebar">
	  <nav class="mt-2">
	    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	    	<li class="nav-item">
	    		<a href="{{ route('logout') }}"
		    		onclick="event.preventDefault();
		    		document.getElementById('logout-form').submit();" class="nav-link">
	    		<i class="nav-icon fas fa-sign-out-alt"></i>
	    		<span>
	    			Logout
	    		</span>
	    	</a>
	    	<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	    		@csrf
	    	</form>
	    </li>
	    </ul>
	  </nav>
	</div>
</aside>