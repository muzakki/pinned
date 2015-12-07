<?php
include_once 'connection/dbconfig.php';
?>
<?php
session_start();
 // Create connection
include_once("connection/dbconnect.php");

//get input from login
$username = $_POST['username'];
$passwordi = $_POST['password'];
$password = md5($passwordi);

 
//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);
 
//cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
    //kalau username dan password kosong
	header('location:index.html?error=1');
    break;
} else if (empty($username)) {
    //kalau username saja yang kosong
	header('location:index.html?error=2');
    break;
} else if (empty($password)) {
    //kalau password saja yang kosong
    //redirect ke halaman index
    header('location:index.html?error=3');
    break;
}
//
 $result = mysqli_query($con,"SELECT * FROM user where user_name='$username' and password='$password'");
 $num_row = mysqli_num_rows($result);
 if ($num_row!=1){
		header('location:index.html?error=4');
		} else {
			$query = mysqli_query($con,"SELECT * FROM user where user_name='$username' and password='$password'");
			if(mysqli_num_rows($query) >0){
				while($data = mysqli_fetch_assoc($query)){
					//$crud->insert_to_logs($data['id_user']);
					$_SESSION['user_id']=$data['id_user'];
					$_SESSION['username']=$username;
					$_SESSION['password']=$password;
					header('location:insert.php');
					header('location:delete.php');
					header('location:myschedule.php');
					//$crud->get_id_user($username,$password);
					//href='insert.php?user_id=$id_user'>
			}
			}
			header('location:home.php');
			}
			
			//<a href="insert.php?id=$data['id_program']"</a>;
?>