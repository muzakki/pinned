<?php
//include_once 'connection/dbconfig.php';
include('config.php');

 // Create connection
//include_once("connection/dbconnect.php");

//get input from login
if(isset($_SESSION['username']))
{
  unset($_SESSION['username'], $_SESSION['userid']);
  echo '<h3>Login Sukses!</h3>';
  header('location:index.php');
} else {
  $ousername = '';
				if(isset($_POST['username'], $_POST['password']))
				{
					$username = mysql_real_escape_string($_POST['username']);
					$passwordi = $_POST['password'];
          $password = md5($passwordi);

					$req = mysql_query('select u_password,id_user from user where u_username="'.$username.'"');
					$dn = mysql_fetch_array($req);

					if($dn['u_password']==$password)
					{
						$form = false;
						$_SESSION['username'] = $_POST['username'];
						$_SESSION['userid'] = $dn['id_user'];

						echo '<h3>Login Sukses!</h3>';
            header('location:index.php');
					} else
					{
            header('location:index.php?error=1');
					}
			} else {
        header('location:index.php?error=1');
			}
}

?>
