<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/admin/dashboard">WataCMS</a>
	</div>
	<!-- Top Menu Items -->
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<?php if (isset($logged_user)) { ?>
				<?php if ( !empty($logged_user['Author']['name']) || !empty($logged_user['Author']['last_name']) ) { ?>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $logged_user['Author']['name'] . ' ' . $logged_user['Author']['last_name']; ?> <b class="caret"></b></a>
				<?php } else { ?>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $logged_user['email']; ?> <b class="caret"></b></a>
				<?php } ?>
			<ul class="dropdown-menu">
				<li>
					<a href="/admin/users/edit/<?php echo $logged_user['id']; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
				</li>
			</ul>
			<?php } ?>
		</li>
	</ul>
	<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav side-nav">
			<li <?php if($this->params['controller'] == 'dashboards') { echo 'class="active"'; } ?>>
				<!-- TODO set propper admin routing for dashboard -->
				<a href="/admin/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
			</li>
			<li>
				<a href="#"><i></i>Notas</a>
			</li>
			<li>
				<a href="#"><i></i>Secciones</a>
			</li>
			<li>
				<a href="#"><i></i>Tags</a>
			</li>
			<li <?php if($this->params['controller'] == 'banners') { echo 'class="active"'; } ?>>
				<a href="/admin/banners"><i class="fa fa-fw fa-money"></i> Banners</a>
			</li>
			<li>
				<a href="#"><i></i>Galerias</a>
			</li>
			<li>
				<a href="#"><i></i>Fotos</a>
			</li>
			<li>
				<a href="#"><i></i>Videos</a>
			</li>
			<li>
				<a href="#"><i></i>Encuestas</a>
			</li>
			<li <?php if($this->params['controller'] == 'users') { echo 'class="active"'; } ?>>
				<a href="/admin/users/"><i class="fa fa-fw fa-users"></i> Editores</a>
			</li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>