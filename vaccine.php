
   <!DOCTYPE html>
	  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-19 Management System</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/bedregstyle.css">
   
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
	$(document).ready(function(){
		$("#type").on('change',function(){
			$(".data").hide();
			$('#' + $(this).val()).fadeIn(700);
		}).change();
		
	$('#ch').click(function(e){
				e.preventDefault();
				$.ajax({
					method:"post",
					url:"fetchdata.php",
					data:$('#disp').serialize(),
					dataType:"html",
					success:function(response){
						$('#h').html(response);
					}
				});
		});

	});
	</script>

</head>
<body>

<header>

  

    <div id="menu" class="fas fa-bars"></div>

    <nav class="navbar">
        <a class="active" href="index.php">Home</a>
		<a href="hosppage.php">Hospitals(beds)</a>
		<!--- <a href="creport.php">Covid test Results</a> -->
		<a href="vacpage.php">Vaccines</a>
    </nav>

</header>


	 <?php  	
									$host="localhost:3306";
									$user="root";
									$pass="Linga@349349";
									$db="sample";
	
									$conn=mysqli_connect($host,$user,$pass,$db);
									
require 'mailDetails.php';
				?>		
				
<div class="wrapper">
<h1>VACCINE REGISTRATION </h1>
	<div class="menu"> 
	

		<p><label>Vaccine(Free/Paid):</label>
                            <select name="type" id="type">
							<option>-------------------SELECT-------------------</option>
                           <option>Free</option>
						   <option>Paid</option>
                            </select>
                            </p>
							</div>
							</div>
							
	<div class="content">
		<div class="data" id="Free">
			<form method="POST">
			<br>
			<br>
				<p><label>Center Name:</label>
                            <select name="bed">
							<option>--------------------------------------------------------SELECT--------------------------------------------------------</option>
                            <?php
							$s="SELECT cname FROM vaccine WHERE pay='Free'";
									
								
									$res=mysqli_query($conn,$s);
									while($rows=mysqli_fetch_assoc($res))
									{
										$hname=$rows['cname'];
										
										echo"<option value='$hname'>$hname</option>";
									}
								?>
                            </select>
                            </p>
							
							<br>
							<br>
							<div id="disp">  </div>
							
							<p><label>Vaccine Name:</label>
                            <select name="vname">
							<option>------------SELECT-------------</option>
                           <option>COVISHIELD (Oxford-AstraZeneca)</option>
							 <option>COVAXIN (Bharat Biotech)</option>
                            </select>
                            </p>
							<br>
							<br>
							<p><label>Dose:</label>
                            <select name="dose">
							<option>------------SELECT-------------</option>
                           <option>1</option>
							 <option>2</option>
                            </select>
                            </p>
							<br>
							<br>
							<label> Full Name: </label>							
			<input type="text" name="pnames" class="ip6">
			<br>
			</br>
			<br>
			<label> Aadhaar NO.: </label>							
			<input type="text" name="paadhar" class="ip7">
			<br>
			</br>
			<br>
			<label>E-mail:</label>					
			<input type="email" name="pmails" class="ip4">
			</br>
			<br>
			<br>
					<label> Mobile:</label>					
			<input type="text" name="pmobs" class="ip2"  maxlength="10">
			</br>
			<br>
			<br>
					<label>Date Of Birth:</label>							
			<input type="date" name="padds" class="ip5">
							<br>
							
							<input type="submit" value="Submit" name="sub1">				
							
	</form>
	<?php
    $host="localhost:3306";
    $user="root";
    $pass="Linga@349349";
    $db="sample";

$r1=rand(1,10000);
$rand="G-$r1";
    $conn=mysqli_connect($host,$user,$pass,$db);

if(isset($_POST['sub1'])){
	$pname=$_POST['pnames'];
	$pmob=$_POST['pmobs'];
	$padd=$_POST['padds'];
	$paadhar=$_POST['paadhar'];
	$hn=$_POST['bed'];
	$bt=$_POST['vname'];
	$dose=$_POST['dose'];
	$email_id=$_POST['pmails'];

	$sql="INSERT INTO vaccineregn (`mobile`, `dob`, `cname`, `aadhar`, `vname`, `dose`, `email`, `name`) VALUES('$pmob','$padd','$hn','$paadhar','$bt','$dose','$email_id','$pname')";
	$query=mysqli_query($conn,$sql);
	
	 if(!$query){
		echo "<script>alert('Invalid Credentials')</script>";
		  
	}
	else{
		echo"<script>alert('Registration Successful... Please check your email inbox for confirmation')</script>";		
		//sending mail to the user
		$mail->setFrom('covidmanagement.team.dsce@gmail.com');
    		$mail->addAddress($email_id);
			$mail->isHTML(true);                                  //Set email format to HTML
    		$mail->Subject = 'Vaccine Booking Successful';

			$mail->Body    = '<p>Dear '.$pname.', your vaccine booking has been successful.</p>
								<p>Centre Name:<b>'.$hn.'</p>
								<p>Vaccine:<b>'.$bt.'</p>
								<p>Dose:<b>'.$dose.'</p>
							  <p>Your vaccine ID : <b>'.$rand.'</b><br/>';

			$mail->AltBody = 'Your Vaccine-ID is '.$rand.'';


			if(!$mail->send()) {
				// echo 'Message could not be sent.';
				// echo 'Mailer Error: ' . $mail->ErrorInfo; No need to print any message
			} else {
				//echo 'Message has been sent'; 
			}
		$s1="UPDATE vaccine SET vavail=vavail-1 where cname='$hn' and vavail>0";
		$q=mysqli_query($conn,$s1);
	}
}

	
	?>
</div>



				<div class="data" id="Paid">
				<form method="GET">
				<br>
				<br>
				<p><label>Center Name:</label>
                            <select name="beds">
							<option>--------------------------------------------------------SELECT--------------------------------------------------------</option>
                            <?php
							$s2="SELECT cname FROM vaccine WHERE pay='Paid'";
									
								
									$res2=mysqli_query($conn,$s2);
									while($rows=mysqli_fetch_assoc($res2))
									{
										$hname=$rows['cname'];
										echo"<option value='$hname'>$hname</option>";
									}
								?>
                            </select>
							
                            </p>

							<br>
							<br>
							
							<div id="disp">  </div>
							
							<p><label>Vaccine Name:</label>
                            <select name="vname">
							<option>------------SELECT-------------</option>
                            <option>COVISHIELD (Oxford-AstraZeneca)</option>
							 <option>COVAXIN (Bharat Biotech)</option>
							  
                            </select>
                            </p>
							<br>
							<br>
							<p><label>Dose:</label>
                            <select name="dose">
							<option>------------SELECT-------------</option>
                           <option>1</option>
							 <option>2</option>
                            </select>
                            </p>
							<br>
							<br>
		<label> Full Name:</label>							
			<input type="text" name="pname" class="ip6">
			<br>
			</br>
			<br>
			<label> Aadhaar NO.: </label>							
			<input type="text" name="paadhar" class="ip7">
			<br>
			</br>
			<br>
			<label>E-mail:</label>					
			<input type="email" name="pmail" class="ip4">
			</br>
			<br>
			<br>
					<label> Mobile:</label>					
			<input type="text" name="pmob" class="ip2">
			<br>
			</br>
			
			<br>
					
					<label>Date Of Birth:</label>							
			<input type="date" name="padd" class="ip5">
							<br>
						
							<input type="submit" value="Submit" name="sub2">	
									

								
		</form>		
	<?php
    $host="localhost:3306";
    $user="root";
    $pass="Linga@349349";
    $db="sample";

    $conn=mysqli_connect($host,$user,$pass,$db);

if(isset($_GET['sub2'])){
	$pname=$_GET['pname'];
	$pmob=$_GET['pmob'];
	$padd=$_GET['padd'];
$paadhar=$_GET['paadhar'];	
	$hn=$_GET['beds'];
	$bt=$_GET['vname'];
	$dose=$_GET['dose'];
	$email_id=$_GET['pmail'];
$r1=rand(1,10000);
$rands="P-$r1";

	$sql="INSERT INTO vaccineregn (`mobile`, `dob`, `cname`, `aadhar`, `vname`, `dose`, `email`, `name`) VALUES('$pmob','$padd','$hn','$paadhar','$bt','$dose','$email_id','$pname')";
	$query=mysqli_query($conn,$sql);
	
	 if(!$query){
		echo "<script>alert('Invalid credentials!')</script>";
		
	}
	else{
		echo"<script>alert('Registration Successful... Please check your email inbox for confirmation')</script>";	

//sending mail to the user
		$mail->setFrom('covidmanagement.team.dsce@gmail.com');
    		$mail->addAddress($email_id);
			$mail->isHTML(true);                                  //Set email format to HTML
    		$mail->Subject = 'Vaccine Booking Successful';

			$mail->Body    = '<p>Dear '.$pname.', your vaccine booking has been successful.</p>
								<p>Centre Name:<b>'.$hn.'</p>
								<p>Vaccine:<b>'.$bt.'</p>
								<p>Dose:<b>'.$dose.'</p>
							  <p>Your vaccine ID : <b>'.$rand.'</b><br/>';

			$mail->AltBody = 'Your Vaccine-ID is '.$rand.'';

			if(!$mail->send()) {
				// echo 'Message could not be sent.';
				// echo 'Mailer Error: ' . $mail->ErrorInfo; No need to print any message
			} else {
				//echo 'Message has been sent'; 
			}
			
	$s1="UPDATE vaccine SET vavail=vavail-1 where cname='$hn' and vavail>0";
		$q=mysqli_query($conn,$s1);
	}
}

	
	?>		
	</div>
	</div>
	




	
	</body>
	</html>