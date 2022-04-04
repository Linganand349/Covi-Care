      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-19 Management System</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
   

</head>
<body>

 
	 <?php  	
									$host="localhost:3306";
									$user="root";
									$pass="Linga@349349";
									$db="sample";
	
									$conn=mysqli_connect($host,$user,$pass,$db);
									

				?>			
<div class="wrapper">
	<div class="menu"> 
		<p><label>type:</label>
                            <select name="type" id="type">
                            <?php
							$sq="SELECT state FROM cases";
									
								
									$res1=mysqli_query($conn,$sq);
									while($rows=mysqli_fetch_assoc($res1))
									{
										$name=$rows['state'];
										$option=$name;
										echo"<option value=$option>$option</option>";
									}
								?>
                            </select>
                            </p>
							</div>
							</div>
							
	<div class="content">
		<div class="data" id="Mahrashtra">
				<p><label>Bed:</label>
                        
                            <?php
							$s="SELECT active FROM cases where state='Mahrashtra'";
									
								
									$res=mysqli_query($conn,$s);
									while($rows=mysqli_fetch_assoc($res))
									{
										$username=$rows['active'];
										echo"$username";
									}
								?>
              
                            </p>
							</div>
				<div class="data" id="Karnataka">
				<p><label>Bed:</label>
                            
                            <?php
							$s2="SELECT dob FROM user";
									
								
									$res2=mysqli_query($conn,$s2);
									while($rows=mysqli_fetch_assoc($res2))
									{
										$dob=$rows['dob'];
										echo"<option value='$dob'>$dob</option>";
									}
								?>
                           
                            </p>
							</div>				
							
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
	$(document).ready(function(){
		$("#type").on('change',function(){
			$(".data").hide();
			$('#' + $(this).val()).fadeIn(700);
		}).change();
	});
	</script>
	
	
	</body>
	</html>