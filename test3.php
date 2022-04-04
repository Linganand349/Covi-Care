<html>
<section class="cases" id="cases">
    <title>STATE-WISE COVID-19 CASES</title>
    <style media="screen">
        table{
			border-collapse:collapse;
			width:750px;
			margin-left:250px;
			margin-top:20px;
			overflow:hidden;
			border-radius:5px 5px;
			box-shadow:0 0 20px rgba(0,0,0,0.15);
        }
        th{
			font-size:20px;
			font-weight:bold;
			color:white;
			padding:6px;
			background-color:mediumaquamarine;
        }
		td{
			 text-align:center;
			 font-size:18px;
			 border-bottom:2px solid #dddddd;
			 
		}
	
		tr:nth-of-type(even){
			background-color:lightcyan;
		}
		tr:last-of-type{
			border-bottom:2px solid #009879;
		}
		h1{
			font-size:30px;
			text-align:center;
			padding-top:3rem;
		}
		
		body{
			background:url(../images/background-img.jpg) no-repeat;
			background-size: cover;
			background-position: center;
			background-attachment: fixed;
		}
		th,
		td{
			padding:10px 12px;
			]
    </style>    
<body>
<?php
    $host="localhost:3306";
    $user="root";
    $pass="Linga@349349";
    $db="sample";

    $conn=mysqli_connect($host,$user,$pass,$db);

?>  
<h1>STATEWISE COVID-19 CASES</h1>
    <table>
        <th>STATE</th>
        <th>ACTIVE</th>
		<th><div class="wrapper">
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
							</div></th>
		
		<?php
		$sql="SELECT * FROM cases";
		$query=mysqli_query($conn,$sql);
		$nums=mysqli_num_rows($query);
		
		
		while($res=mysqli_fetch_array($query)){
			?>
			<tr>
			 <td><?php echo $res['state']; ?></td>
			 <td><?php echo $res['active']; ?></td>
			 <td>	<div class="content">
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
	</td>
			</tr>
			<?php
		}
	  ?>
    </table>
</body>
</section>


</html>




