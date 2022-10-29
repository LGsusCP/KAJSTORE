<?php


	if(!isset($_SESSION['admin_email'])){

		echo "<script>window.open('login.php','_self')</script>";

	}else {




?>

<div class="full-width navBar">
			<div class="full-width navBar-options">
				<i class="zmdi zmdi-swap btn-menu" id="btn-menu"></i>	
				<div class="mdl-tooltip" for="btn-menu">Hide / Show MENU</div>
				<nav class="navBar-options-list">
					<ul class="list-unstyle">
						<li class="btn-Notification" id="notifications">
							<i class="zmdi zmdi-notifications"></i>
							<div class="mdl-tooltip" for="notifications">Notifications</div>
						</li>
						<a href="logout.php">
							<li>
								<i class="zmdi zmdi-power"></i>
								<div class="mdl-tooltip" for="btn-exit">Salir</div>
							</li>
						</a>
						<li class="text-condensedLight noLink" ><small><?php echo $admin_name; ?></small></li>
						<li class="noLink">
							<figure>
								<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
							</figure>
						</li>
					</ul>
				</nav>
			</div>
		</div>
<?php } ?>		