<?php
	include('config.php');
?>
<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <head>

		<!-- Import Google Material Icon -->
		<link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel="stylesheet"/>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Raleway:200,600,900'/>

		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="assets/css/general.css"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	</head>

    <body>
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<div id="la-container" class="dashboard-page">
			<nav id="main-header" class="cyan">
				<div class="nav-wrapper">

					<a href="index.html" class="brand-logo">
						<p style="color:#fff;line-height:0px">Pinned</p>
					</a>

					<div class="search">
					</div>

					<ul class="right side-nav">
						<li><a href="#"><i class="mdi-action-settings"></i></a></li>
						<li class="relative"><a href="#"><i class="mdi-social-notifications"></i></a><div class="pulse"></div></li>
					<li class="relative" id="profile-link-example"><a href="#"><i class="material-icons">account_circle</i></a></li>
					</ul>
				</div>
			</nav>

			<section id="dashboard-content" style="background:#fafafa">
				<div class="container">
					<div class="row">
						<div class="col s12 m6 l6 offset-m3 offset-l3">
							<h4 style="color:#1e88e5;text-align:center"> Sign Up </h4>

							<div class="card">
								<div class="card-content">
									<form action="signup1.php" method="post">
										<?php
												if (!empty($_GET['error'])) {
											    if ($_GET['error'] == 1) {
											        $rep = "<h3 style='color:red'>Fill the all fields!!</h3>";
											    } else if ($_GET['error'] == 2) {
											        $rep = "<h3 style='color:red'>Password doesn\'t match!!</h3>";
											    } else if ($_GET['error'] == 3) {
											        $rep = "<h3 style='color:red'>Username already taken!!</h3>";
											    }
											}
											echo $rep;
										?>
										<div class="row">
											<div class="input-field col s12">
												<input id="fullname" name="fullname" type="text" class="validate">
												<label for="fullname">Name</label>
											</div>
										</div>

										<div class="row">
											<div class="input-field col s12">
												<input id="username" name="username" type="text" class="validate">
												<label for="username">Username</label>
											</div>
										</div>

										<div class="row">
											<div class="input-field col s12">
												<input id="email" name="email" type="email" class="validate">
												<label for="email">Email</label>
											</div>
										</div>

										<div class="row">
											<div class="input-field col s12">
												<input id="password" name="password" type="password" class="validate">
												<label for="password">Password</label>
											</div>
										</div>

										<div class="row">
											<div class="input-field col s12">
												<input id="verifpass" name="verifpass" type="password" class="validate">
												<label for="verifpass">Confirm Password</label>
											</div>
										</div>

										<div class="row">
											<div class="input-field" style="text-align:center">
												<button class="btn z-depth-1 blue lighten-1 waves-effect waves-light" type="submit" name="action"> Sign Up
													<i class="mdi-content-send right"></i>
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>

						</div>
					</div>
				</div>


			</section>
		</div>
		<script type="text/javascript" src="assets/js/libs/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/libs/materialize.min.js"></script>
		<script type="text/javascript" src="assets/js/libs/masonry.min.js"></script>
		<script type="text/javascript" src="assets/js/libs/scrollTo.min.js"></script>
		<script type="text/javascript" src="assets/js/libs/modernizr.mq.js"></script>
		<script type="text/javascript" src="assets/js/libs/jquery.cookie.js"></script>
		<script type="text/javascript" src="assets/js/libs/jquery.joyride.js"></script>
		<script type="text/javascript" src="assets/js/main.js"></script>
		<script type="text/javascript" src="assets/js/tour-manager.js"></script>
		</body>

		<!-- Mirrored from lifeaweso.me/get-a-tour/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Nov 2015 17:30:37 GMT -->
	</html>
