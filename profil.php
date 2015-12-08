
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
		<!--<link type="text/css" rel="stylesheet" href="assets/css/joyride.css"/>
			<link type="text/css" rel="stylesheet" href="assets/css/override.css"/>
			<link type="text/css" rel="stylesheet" href="assets/css/general.css"/>

			<link type="text/css" rel="stylesheet" href="assets/css/form.css"/>
			<link type="text/css" rel="stylesheet" href="assets/css/header.css"/>

			<link type="text/css" rel="stylesheet" href="assets/css/tab-content.css"/>

			<link type="text/css" rel="stylesheet" href="assets/css/dashboard.css"/>
			<link type="text/css" rel="stylesheet" href="assets/css/profile.css"/>
			<link type="text/css" rel="stylesheet" href="assets/css/board.css"/>
		-->



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
						<a id="login"><i class="material-icons">account_circle</i><div class="pulse"></div></a></li>
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
						$query = "SELECT * FROM user"; //You don't need a ; like you do in SQL
						$result = mysql_query($query);
						$row = mysql_fetch_array($result);   //Creates a loop to
?>


      <div class="row">
          <div class="s10 offset-s1 col">
            <div class="m12 col">
              <div class="card">
                <div class="card-content row">
                  <div class="s12 l3 col">
										<?php if(isset($row['u_profilpict'])){
										?>
                    <img src="<?php echo $row['u_profilpict']?>" class="align-right circle">
										<?php
									}
									?>
                  </div>
                  <div class="s12 l9 col">
                    <h4><?php echo $row['u_name']?></h4>
                    <label>Username: </label><?php echo $row['u_username']?><br>
                    <label>Email: </label><?php echo $row['u_email']?><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

			<h5>Pinned Event</h5>
			<div class="container">
<?php
			$query = 'SELECT * from event_table'; //You don't need a ; like you do in SQL
			$result = mysql_query($query);
			$i = 0;
			echo "<table class='striped'>"; // start a table tag in the HTML
?>
			<tr>
				<th>Event Title</th>
				<th>Location</th>
				<th>Date</th>
			</tr>
<?php
			while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
				if($i > 1){
					break;
				};
				echo "<tr><td>" . $row['e_name'] . "</td><td>" . $row['e_place'] . "</td><td>" . $row['e_date']."</td></tr>";  //$row['index'] the index here is a field name
				$i += 1;
			}

			echo "</table>";
?>
</div>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.js"></script>
  <script>
       $('#profile').webuiPopover({url:'#login-form'});
  </script>

</body>
</html>
