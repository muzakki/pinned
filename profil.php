<?php
	include('config.php');
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Raleway:200,600,900'/>
		<link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/joyride.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/override.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/general.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/form.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/header.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/card.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/tab-content.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/tour-manager.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/dashboard.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/profile.css"/>
		<link type="text/css" rel="stylesheet" href="assets/css/board.css"/>
		<link type="text/css" rel="stylesheet" href="materialize/css/style.css"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.css"/>

		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
		<script type="text/javascript" src="assets/js/libs/masonry.min.js"></script>
		<script type="text/javascript" src="assets/js/libs/scrollTo.min.js"></script>
		<script type="text/javascript" src="assets/js/libs/modernizr.mq.js"></script>
		<script type="text/javascript" src="assets/js/libs/jquery.cookie.js"></script>
		<script type="text/javascript" src="assets/js/libs/jquery.joyride.js"></script>
		<script type="text/javascript" src="assets/js/main.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.js"></script>

	</head>
<body>
    <nav id="main-header" class="cyan">
      <div class="nav-wrapper">
        <a href="index.php" class="brand-logo" style="font-family:raleway;padding:0px">Pinned</a>
        <div class="header-search-wrapper hide-on-med-and-down">
          <i class="mdi-action-search active"></i>
          <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search Event">
        </div>
        <ul class="right side-nav">
          <li><a href="#"><i class="mdi-social-notifications"></i></a></li>
          <li  class="relative" id="profile">
          <a><img class="profile-img" src="assets/imgs/commons/me.png"/><div class="pulse waves-effect waves-cyan-lighten-5"></div></a></li>
        </ul>
      </div>
    </nav>


    <div id="login-form" class="row webui-popover-content">
            <div class="col s12">
              <form class="loginform" action="login.php" method="post">
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
                    <a href="index.html" class="btn waves-effect waves-light col s12">Login</a>
                  </div>
                </div>
                <div class="margin">
                  <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="signup.html">Register Now!</a></p>
                  </div>
                  <!--
                    <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
                  </div> -->
                </div>
              </form>
            </div>
    </div>
    <div id="dashboard-cover" class="custom-parallax"></div>

    <section id="dashboard-content">
      <div id="dashboard-content-tabs" class="tabs-menu z-depth-1">
        <div class="container">
          <div class="row">
            <div class="col s12">
              <ul class="tabs">
                <li class="tab" style="width:50%"><a href="#stream">stream</a></li>
                <li class="tab" style="width:50%"><a href="#tour-manager-nope" class="modal-trigger">discover</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
          <div class="s10 offset-s1 col">
            <div class="m12 col">
              <div class="card">
                <div class="card-content row">
                  <div class="s12 l3 col">
                    <img src="assets\imgs\commons\profile.jpg" class="align-right circle">
                  </div>
                  <div class="s12 l9 col">
                    <h4>Boy</h4>
                    <label>Username</label>boyboyan<br>
                    <label>Email</label>boy@boyan.com<br>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
<?php
			$query = 'SELECT * FROM pinned_table where id_user ="'.$_SESSION['userid'].'";'; //You don't need a ; like you do in SQL
			$result = mysql_query($query);

			echo "<table>"; // start a table tag in the HTML

			while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
				echo "<tr><td>" . $row['name'] . "</td><td>" . $row['age'] . "</td></tr>";  //$row['index'] the index here is a field name
			}

			echo "</table>";
?>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.js"></script>
  <script>
       $('#profile').webuiPopover({url:'#login-form'});
  </script>

</body>
</html>
