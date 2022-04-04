<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login Form</title>

<!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <!-- custom css file link  -->
    <link rel="stylesheet" href="css/loginstyle.css">
</head>
<body>
<div class="center">
	<h1>LOGIN<h1>
	<form method="post">
	<div class="txt_field">
	<input type="text" name="username" required>
	<span></span>
	<label>Username</label>
</div>

<div class="txt_field">
	<input type="password" name="pass1" required>
	<span></span>
	<label>Password</label>
</div>
<div class="pass">
<a href="forg_pass.php">Forgot Password?</a>
</div>
	<input type="submit" value="Login" name="login">
	<div class="reg">
	New User?  <a href="register.php">Register</a>
	</div>	

</form>
</div>
<?php
	session_start();
    $host="localhost:3306";
    $user="root";
    $pass="Linga@349349";
    $db="sample";

    $conn=mysqli_connect($host,$user,$pass,$db);
	if($conn) echo'dest';
	if(isset($_POST['login'])){
	$username=$_POST['username'];
	$pass1=md5($_POST['pass1']);
	
	$s="SELECT * FROM user WHERE username='$username' and pass='$pass1'";
	$res=mysqli_query($conn,$s);
	$num=mysqli_num_rows($res);
	if($num==1){
		$_SESSION['username']=$username;
		header('location:index.php');
	}
	else{
		echo "<script>alert('Invalid Credentials')</script>";
	}
	}	

?>

</body>
</html>
