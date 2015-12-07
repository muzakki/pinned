<?php
  session_start();
   // Create connection
  include_once("connection/dbconnect.php");

      $name = mysqli_real_escape_string($con, $_POST['fullname']);
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $passwordi = mysqli_real_escape_string($con, $_POST['password']);
      $verifpass = mysqli_real_escape_string($con, $_POST['verifpass']);

      if($name!='' && $email!='' && $username!='' && $passwordi!='' && $verifpass!='') {
        if($passwordi==$verifpass) {
          $password=md5($passwordi);

      $q = mysqli_query($con,"SELECT * FROM user");
      $row = mysqli_fetch_array($q);
      $dbuname=$row['u_username'];
      if($username==$dbuname) {
        $message = "The username already taken!!";
        echo "<script type='text/javascript'>alert('$message');</script>";
      } else {
        mysqli_query($con,"INSERT INTO user (u_username,u_password,u_email,u_name)
        VALUES ('$username','$password','$email','$name')");

        echo '<script language="javascript">';
        echo 'alert("Signup success!!");';
        echo 'window.location.href="index.html";';
        echo '</script>';
      }
    } else {
    $message = "The password doesn't match!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    }
  } else {
    $message = "Fill up the all fields!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  echo '<script type="text/javascript">window.location.href="signup.html";</script>';
?>
