<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>ClotheShop</title>

	<!-- Bootstrap -->
	<link href="<?php echo assetsPath('css/bootstrap.min.css')?>" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<header>
	<div class="bg-dark collapse" id="navbarHeader" style="">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-md-7 py-4" style="align-self: center;">
					<?php if (empty($_SESSION['user'])) : ?>
						<form class="navbar-form" role="search" method="post" action="<?php echo url('/login') ?>">
							<div class="form-group" style="display: inline-block">
								<input type="text" class="form-control" name="name" placeholder="Username" value="">
							</div>
							<div class="form-group" style="display: inline-block">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<button type="submit" style="vertical-align: initial" class="btn btn-primary my-2">Sign In
							</button>
						</form>
						<button type="button" class="btn btn-secondary" data-toggle="modal"
						        data-target="#register-user">
							Register
						</button>
					<?php else: ?>

						<h1 class="jumbotron-heading text-white">Welcome <?php echo $_SESSION['user']->name ?></h1>

					<?php endif; ?>


					<!-- START MODAL -->
					<div class="modal fade" id="register-user" tabindex="-1"
					     aria-labelledby="register-user-label" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="register-user-label">User Register Form</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form method="post" action="<?php echo url('/register') ?>">
									<div class="modal-body">
										<div class="form-group">
											<label for="name" class="col-form-label">Name</label>
											<input type="text" class="form-control" name="name">
										</div>
										<div class="form-group">
											<label for="email" class="col-form-label">Email</label>
											<input type="email" class="form-control" name="email">
										</div>
										<div class="form-group">
											<label for="phone" class="col-form-label">Phone</label>
											<input type="text" class="form-control" name="phone">
										</div>
										<div class="form-group">
											<label for="password" class="col-form-label">Password</label>
											<input type="password" class="form-control" name="password">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close
										</button>
										<button type="submit" value="Register" name="register" class="btn btn-primary">
											Register
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- END MODAL -->

				</div>
				<div class="col-sm-4 offset-md-1 py-4">
					<h4 class="text-white">Menu</h4>
					<ul class="list-unstyled">
						<li><a href="<?php echo url('/') ?>" class="text-white">Home</a></li>
						<li><a href="<?php echo url('/cart') ?>"
						       class="text-white">Cart <?php echo $_SESSION['cart']->count(); ?></a></li>
						<?php if (isset($_SESSION['user'])) : ?>
							<?php if ($_SESSION['user']->is_admin) : ?>
								<li><a href="<?php echo url('/admin/products') ?>" class="text-white">Admin</a></li>
							<?php endif; ?>
							<li><a href="<?php echo url('/logout') ?>" class="text-white">Logout</a></li>
						<?php endif; ?>

					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="navbar navbar-dark bg-dark box-shadow">
		<div class="container d-flex justify-content-between">
			<a href="<?php echo url('/') ?>" class="navbar-brand d-flex align-items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
				     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
					<path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
					<circle cx="12" cy="13" r="4"></circle>
				</svg>
				<strong>ClotheShop</strong>
			</a>
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader"
			        aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</div>
</header>