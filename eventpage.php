
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

			<?php
						$query = "SELECT * FROM event_table where id_event=".$_GET['id']; //You don't need a ; like you do in SQL
						$result = mysql_query($query);
						$row = mysql_fetch_array($result);
			?>

			<section id="dashboard-content">

					<div class="container" style="padding-left:90px;padding-right:90px">
						<div style="margin-top:20px;" class="row">
							<div id="event-banner">
								<img src="<?php echo $row['e_picture'] ?>">
							</div>
						</div class="row">
						<div class="row" style="max-width:600px">
							<h5> <?php echo $row['e_name'] ?> </h5>
							<br>
							<h6> <?php echo $row['e_descript'] ?> </h6>

							<div class="divider"></div>
							<div>
												<span style="margin-left:10px;margin-right:10px;float:left"> <i class="material-icons">event</i></span> <p> <?php echo $row['e_date'] ?> </p>
												<span style="margin-left:10px;margin-right:10px;float:left"> <i class="material-icons">room</i></span> <p> <?php echo $row['e_place'] ?> </p>
											</div>
										</div>
							<?php


							if(isset($_SESSION['username'])){
								$query3 = "SELECT * FROM pinned_event where id_user = ".$_SESSION['userid'];
								$rest = mysql_query($query3);
								$gett = mysql_fetch_array($rest);

								$query2 = "INSERT INTO pinned_event (id_event, id_user) VALUES
								(".$row['id_event'].",".$_SESSION['userid'].")";

								if (isset($_GET['var'])) {
									if ($_GET['var']){
										$dn = mysql_num_rows(mysql_query('select id_user from pinned_event where id_event="'.$_GET['id'].'"'));
										if($dn==0){
											mysql_query($query2);
										}
									}
								}

								$dn = mysql_num_rows(mysql_query('select id_user from pinned_event where id_event="'.$_GET['id'].'"'));

								if($dn==0){
									echo "<a class='btn green waves-effect waves-light' href='eventpage.php?var=true&id=".$_GET['id']."'>Pin to my Calendar</a>";

								} else {
								?>
									<button class="btn light-grey waves-effect waves-light"  >Already pinned</button>
								<?php
								}
							}
								?>

						</div>
					</div>





						<style>

							.margin{
							padding-bottom:0px;
							margin-left: auto;
							margin-right: auto;
							}

						</style>
					</div>
					<div id="space">
						<div class="row" style="padding-bottom: 100px"></div>
					</div>
				</section>

			</div>

			<script src="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.js"></script>
			<script>
           $('#login').webuiPopover({url:'#form'});
      </script>
		</body>

	</html>
