<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top">
<div class="brand"> ConcrtMe
<!-- 	<a href="#">
  $this->Html->image('concrt_me_logo.svg', array('alt' => 'Concrtme' , 'class' => "img-responsive logo"));   
	</a> -->
</div>
<div class="container-fluid">
	<div class="navbar-btn">
		<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
	</div>

	<div id="navbar-menu">
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
					<i class="lnr lnr-alarm"></i>
					<span class="badge bg-danger">1</span>
				</a>
				<ul class="dropdown-menu notifications">
					<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>				 
				</ul>
			</li>			 
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Admin</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
				<ul class="dropdown-menu">
					<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
					<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>					 
					<li><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-exit')).'Logout', array('controller' => 'admin', 'action' => 'logout'), array('escape' => false)) ?></li>
				</ul>
			</li>

		</ul>
	</div>
</div>
</nav>
<!-- END NAVBAR -->
<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
<div class="sidebar-scroll">
	<nav>
		<ul class="nav">
			<li><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-home')).'Dashboard', array('controller' => 'admin', 'action' => 'dashboard'), array('escape' => false)) ?></li>
			<li>
				<a href="#subUsers" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-user"></i> <span>Users</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
				<div id="subUsers" class="collapse ">
					<ul class="nav">
						<li><?= $this->Html->link('Musician', array('controller' => 'admin', 'action' => 'musicians'), array('escape' => false)) ?></li>
						<li><?= $this->Html->link('Organiser', array('controller' => 'admin', 'action' => 'musicians'), array('escape' => false)) ?></li>
					</ul>
				</div>
			</li>
			<li><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-store')).'Venues', array('controller' => 'admin', 'action' => 'venues'), array('escape' => false)) ?></li>
			<li><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-clock')).'Compaigns', array('controller' => 'admin', 'action' => 'compaigns'), array('escape' => false)) ?></li>
			<li><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-chart-bars')).'Analytics', array('controller' => 'admin', 'action' => 'analytics'), array('escape' => false)) ?></li>						
			<li><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-cog')).'Site Settings', array('controller' => 'admin', 'action' => 'settings'), array('escape' => false)) ?></li>
	    </ul>
	</nav>
</div>
</div>
<!-- END LEFT SIDEBAR -->
