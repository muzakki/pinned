
<?php
	include('config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Raleway:200,600,900'/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
		rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.css">

		<link type="text/css" rel="stylesheet" href="assets/css/card.css"/>
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"/>
		<link type="text/css" rel="stylesheet" href="materialize/css/style.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/tour-manager.css"/>

		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
		<script type="text/javascript" src="assets/js/libs/masonry.min.js"></script>
		<script type="text/javascript" src="assets/js/libs/scrollTo.min.js"></script>
		<script type="text/javascript" src="assets/js/libs/modernizr.mq.js"></script>
		<script type="text/javascript" src="assets/js/libs/jquery.cookie.js"></script>
		<script type="text/javascript" src="assets/js/libs/jquery.joyride.js"></script>
		<script type="text/javascript" src="assets/js/main.js"></script>

		<script language="javascript">
			function getXmlHttpObject(){
				var xmlhttp = null;
				if (window.XMLHttpRequest){
					xmlhttp= new XMLHttpRequest();
					} else {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						return xmlhttp;
						}
			function getpages(url,centercol){
				xmlhttp=getXmlHttpObject();
				if(xmlhttp){
					var obj = document.getElementById(centercol);
					xmlhttp.open("GET",url);
					xmlhttp.onreadystatechange=function(){
						if(xmlhttp.readyState ==1){
							obj.innerHTML = 'work'
							}
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
							obj.innerHTML = xmlhttp.responseText;
							}
							}
							xmlhttp.send(null);
							}
							}
		</script>
	</head>
	<body>

		<div id="la-container" class="dashboard-page">
			<div class="navbar-fixed">
				<nav id="main-header" class="cyan">
				<div style="padding-left:30px;padding-right:30px"class="nav-wrapper">
					<a href="index.php" class="brand-logo" style="font-family:raleway;padding:0px;padding-left:30px">Pinned</a>
					<div class="header-search-wrapper hide-on-med-and-down">
						<i class="mdi-action-search active"></i>
						<input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search Event">
					</div>
					<ul class="right">
<!--						<li><a><i class="mdi-social-notifications"></i></a></li> -->
						<li  class="relative waves-effect waves-cyan-darken-1">
							<?php
							if(isset($_SESSION['username'])){
								?>
								<a id="login"><i class="material-icons">account_circle</i><div class="pulse"></div></a></li>
								<?php
							} else {
							?>
						<a id="login"><i class="material-icons">account_circle</i></a></li>
						<?php
						}
					 ?>
					</ul>
				</div>
			</nav>
			</div>
			<div id="form" class="row webui-popover-content">
				<div class="col s12">

<?php
			if(!isset($_SESSION['username'])) {
?>
<form class="loginform" action="login.php" method="post">
	<div class="margin">
		<div class="input-field col s12 center">
			<p class="center login-form-text">Login with your account</p>
			<?php
				$rep = '';
				if (!empty($_GET['error'])) {
						if ($_GET['error'] == 1) {
								$rep = "<h3 style='color:red'>Fill the all fields!!</h3>";
						}
				}
				echo $rep;
			?>
		</div>
	</div>

	<div class="margin">
		<div class="input-field col s12" style="margin-bottom:0px">
			<i class="mdi-social-person-outline prefix"></i>
			<input id="username" name="username" type="text">
			<label for="username" class="center-align">Username</label>
		</div>
	</div>
	<div class="margin">
		<div class="input-field col s12" style="margin-bottom:0px">
			<i class="mdi-action-lock-outline prefix"></i>
			<input id="password" name="password" type="password">
			<label for="password">Password</label>
		</div>
	</div>

	<div class="margin" style="padding-bottom:0px">
		<div class="input-field col s12" style="margin-bottom:0px">
			<button class="btn waves-effect waves-light col s12" type="submit" name="action">Login</button>
		</div>
	</div>
	<div class="margin">
		<div class="input-field col s6 m6 l6">
			<p class="margin medium-small"><a href="signup.php">Register Now!</a></p>
		</div>
		<!--
			<div class="input-field col s6 m6 l6">
			<p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
		</div> -->
	</div>
</form>


<?php
			} else {

?>

	<li><a href="profil.php">Profile</a></li>
	<li><a href="login.php">Logout</a></li>

<?php
			}
	?>
				</div>
			</div>
		</div>

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
