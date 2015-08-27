<nav class="navbar navbar-inverse" style="padding: 0">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Ve May Bay</a>
		</div>
		<div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="<?php echo defineKHACHHANG; ?>"><span class="glyphicon glyphicon-user"></span> Khách hàng</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php echo date("l").", ".date("F")." ".date("d"); ?></a></li>
				<li class="dropdown">
					<a href<?php echo defineSETTINGS; ?> class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expand="false">
						Hello , <?php echo $_SESSION['username']." "; ?><span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a>Settings</a></li>
						<li><a href="<?php echo defineLOGOUT; ?>">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>