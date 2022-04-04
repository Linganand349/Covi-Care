<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Regi Form</title>

<!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <!-- custom css file link  -->
    <link rel="stylesheet" href="css/forgpass.css">
</head>
<body>
<div class="regform">
<form method="POST">
<h1>Recover Account</h1>

<div class="txt">
<input type="email" name="email" required>
<span></span>
<label>Enter E-Mail</label>
</div>
<input type="submit" value="Submit" name="register">

  
</form>
</div>
<?php
session_start();
    $host="localhost:3306";
    $user="root";
    $pass="Linga@349349";
    $db="sample";

    $conn=mysqli_connect($host,$user,$pass,$db);



if(isset($_POST['register'])){

	$email=$_POST['email'];

		$s="SELECT * FROM user WHERE email='$email'";
		$res=mysqli_query($conn,$s);
		$num=mysqli_num_rows($res);
		if($num){
		$userdata=mysqli_fetch_array($res);
		$username=$userdata['username'];
		
			$subject="Reset Password";
			$body="Hi $username, Click here to reset your password.
			http://localhost/phpprog/resetpass.php";
		$sender_email="From:linganandbs349@gmail.com";
			if(mail($email, $subject, $body, $sender_email)){
				$_SESSION['msg']="check your mail to reset your password $email";
				header('location:login.php');
			}
			else{
				echo "<script>alert('Email sending failed')</script>";
			}
		}
	
		else{
			echo "<script>alert('e-mail not found')</script>";		
	}


}
?>

</body>

</html>
