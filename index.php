
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

<!--			<section id="dashboard-content">
				<div id="dashboard-content-tabs" class="tabs-menu z-depth-1">
					<div class="container">
						<div class="row">
							<div class="col s12">
								<ul class="tabs">
									<li class="tab" style="width:50%"><a class="waves-effect" href="#stream">stream</a></li>
									<li class="tab" style="width:50%"><a class="waves-effect waves-green" href="#tour-manager-nope" class="modal-trigger">discover</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
-->


				<div id="dashboard-content-wrapper" class="tabs-content">
					<div class="container">
						<div id="content" class="row">
							<div id="categoty-name" style="padding:15px;padding-bottom:0px;font-family:roboto">
								<p style="font-size:25px;
								font-weight:300;line-height:0px;margin-bottom: 10px;"> New Events </p>
								<div class="row" style="    margin-bottom: 0px; padding-left: 10px;padding-right: 10px">
<!--								<a style="float:right;display:block;text-transform: none;;color:white;padding-left:5px;padding-right:5px;padding-bottom:0px; margin-right:5px;font-weight:normal;width:78px" class="btn-flat green waves-effect waves-light right-align;font-weight:normal"> See more </a> -->
						</div>
							</div>

							<div style="clear:both" id="stream">
								<!--<a style="display:block;text-transform: none;float:right;color:white;padding-left:5px;padding-right:5px;padding-bottom:0px;font-weight:normal;width:78px" class="btn-flat green waves-effect waves-light right-align;font-weight:normal"> See more </a>-->
								<!-- event cards-->

								<?php
											$query = "SELECT * FROM event_table"; //You don't need a ; like you do in SQL
											$result = mysql_query($query);

											while($row = mysql_fetch_array($result)){   //Creates a loop to
?>
								<div class="row" style="clear:both">
									<div class="event-card col s12 m4 l3">
										<div class="card">
											<div class="card-image">
												<img style="max-height:200px" src="<?php echo $row['e_picture'] ?>">
												<span class="card-title" style="background-color:rgba(0,0,0,0.5);padding-left:0px;padding-bottom:3px;padding-left:5px"><?php echo $row['e_name'] ?></span>
											</div>
											<div class="divider"></div>
											<div style="height:100px;max-height:100px">
												<span style="margin-left:10px;margin-right:10px;float:left"> <i class="mdi-action-event"></i></span> <p> <?php echo $row['e_date'] ?> </p>
												<span style="margin-left:10px;margin-right:10px;float:left"> <i class="mdi-action-room"></i></span> <p> <?php echo $row['e_place'] ?> </p>
											</div>
											<?php
											$dirr = "eventpage.php?id=".$row['id_event'];
											 ?>
											<div class="card-action">
												<a href=<?php echo $dirr ?>>View</a>
<!--												<a href=''>Join</a> -->
											</div>

										</div>
									</div>
								</div>
<?php
	}
?>

						<div id="form" class="row dropdown-content">
							<div class="col s12">
								<form class="loginform">
									<div class="margin">
										<div class="input-field col s12 center">
											<p class="center login-form-text">Login with your account</p>
										</div>
									</div>
									<div class="margin">
										<div class="input-field col s12" style="margin-bottom:0px">
											<i class="mdi-social-person-outline prefix"></i>
											<input id="username" type="text">
											<label for="username" class="center-align">Username</label>
										</div>
									</div>
									<div class="margin">
										<div class="input-field col s12" style="margin-bottom:0px">
											<i class="mdi-action-lock-outline prefix"></i>
											<input id="password" type="password">
											<label for="password">Password</label>
										</div>
									</div>
									<div class="margin">
										<div class="input-field col s12 m12 l12  login-text"style="margin-bottom:0px">
											<input type="checkbox" id="remember-me" />
											<label for="remember-me">Remember me</label>
										</div>
									</div>
									<div class="margin" style="padding-bottom:0px">
										<div class="input-field col s12" style="margin-bottom:0px">
											<a href="index.php" class="btn waves-effect waves-light col s12">Login</a>
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
							</div>
						</div>





						<style>

							.margin{
							padding-bottom:0px;
							margin-left: auto;
							margin-right: auto;
							}
				i.mdi-action-search.active{color:#767676}
						</style>
					</div>
				</section>



			</div>
		</div>
			<script src="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.js"></script>
			<script>
				$('#login').webuiPopover({url:'#form'});
			</script>
		</body>

	</html>
