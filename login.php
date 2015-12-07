<?php
//include_once 'connection/dbconfig.php';
include('config.php');

 // Create connection
//include_once("connection/dbconnect.php");

//get input from login
$ousername = '';
				if(isset($_POST['username'], $_POST['password']))
				{
					$username = mysql_real_escape_string($_POST['username']);
					$password = $_POST['password'];

					$req = mysql_query('select u_password,id_user from user where u_username="'.$username.'"');
					$dn = mysql_fetch_array($req);

					if($dn['password']==sha1($password) and mysql_num_rows($req)>0)
					{
						$form = false;
						$_SESSION['username'] = $_POST['username'];
						$_SESSION['userid'] = $dn['id'];
						if(isset($_POST['memorize']) and $_POST['memorize']=='yes')
						{
							$one_year = time()+(60*60*24*365);
							setcookie('username', $_POST['username'], $one_year);
							setcookie('password', sha1($password), $one_year);
						}
						echo '<h3>Login Sukses!</h3>';
            header('index.php');
					}
					else
					{
						$form = true;
						$message = 'Wrong username or password!!';
					}
				}
				else
				{
					$form = true;
					$message = 'Fill the all fields!!';
				}
				if($form)
				{
					if(isset($message))
					{
						header('index.php?error=1');
					}
				}
?>
