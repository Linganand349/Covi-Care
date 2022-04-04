<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Regi Form</title>

<!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <!-- custom css file link  -->
    <link rel="stylesheet" href="css/regstyle.css">
</head>
<body>
<div class="regform">
<form method="POST">
<h1>User Registration</h1>
<div class="txt">
<input type="text" name="name" required>
<span></span>
<label>Fullname</label>
</div>
<div class="txt">
<input type="text" name="username" required>
<span></span>
<label>Enter Username</label>
</div>
<div class="txt">
<input type="password" name="pass1" required>
<span></span>
<label>Enter Password</label>
</div>
<div class="txt">
<input type="password" name="cpass" required>
<span></span>
<label>Confirm Password</label>
</div>

<div class="txt">
<input type="tel" name="mobile" required>
<span></span>
<label>Enter Mobile No.</label>
</div>
<div class="txt1">
<input type="date" name="dob" required>
<span></span>
<label>Date Of Birth</label>
</div>

<input type="submit" value="Register" name="register">

<div class ="alr">
Already Registered?
</div>
<div class ="log">
 <a href="login.php">Please Login</a>
</div>

  
</form>
</div>
<?php
    $host="localhost:3306";
    $user="root";
    $pass="Linga@349349";
    $db="sample";

    $conn=mysqli_connect($host,$user,$pass,$db);


if(isset($_POST['register'])){
	$name= $_POST['name'];
	$username=$_POST['username'];
	$pass1=md5($_POST['pass1']);
	$cpass=md5($_POST['cpass']);
	$mobile=$_POST['mobile'];
	$dob=$_POST['dob'];
	
	
	if($pass1==$cpass){
		$s="SELECT * FROM user WHERE username='$username'";
		$res=mysqli_query($conn,$s);
		$num=mysqli_num_rows($res);
		if($num==1){
			echo "<script>alert('USERNAME ALREADY TAKEN! Please choose different username')</script>";
			
		}
		else{
			$s1="SELECT * FROM user WHERE mobile='$mobile'";
		$r=mysqli_query($conn,$s1);
		$n=mysqli_num_rows($r);
		if($n==1){
			echo "<script>alert('Mobile no. already registered. Please Login')</script>";
		}
		else{
	$sql="INSERT INTO user (`name`, `username`, `pass`, `cpass`, `mobile`, `dob`) VALUES ('$name', '$username', '$pass1', '$cpass', $mobile, '$dob')";
	$query=mysqli_query($conn,$sql);
	
	 if(!$query){
		echo "<script>alert('Invalid credentials!')</script>";
		
	}
	else{
		echo"<script>alert('Registration Successful... Please Login')</script>";								/*go to next page in if-else: header(Location:"login.html");*/
	
	}
	}
	}
	}
	else{
		echo "<script>alert('Passwords do not match!')</script>";
	}
}
?>

</body>

</html>
