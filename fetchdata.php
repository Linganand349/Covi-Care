
 <?php  
 
									$host="localhost:3306";
									$user="root";
									$pass="Linga@349349";
									$db="sample";
	
									$conn=mysqli_connect($host,$user,$pass,$db);
	if(isset($_POST['but'])){
		?>
		<table id="myTable">
        <th>NAME</th>
		<th>Regular Bed</th>
		<th>Bed With Oxygen</th>
		<th>Bed With VENTILATOR</th>
		<th>ICU Bed</th>
		<th>Total Vacant Beds</th>
		<?php
	$name= $_POST['bed'];
	$sql="SELECT * FROM `hospitals` WHERE `hname`='$name'";
		$query=mysqli_query($conn,$sql);
			
		while($res=mysqli_fetch_array($query)){
			?>
			<tr>
			<td><?php echo $res['hname']; ?></td>
			 <td><?php echo $res['regbed']; ?></td>
			 <td><?php echo $res['oxybed']; ?></td>
			 <td><?php echo $res['ventbed']; ?></td>
			 <td><?php echo $res['icubed']; ?></td>
			 <td><?php echo $res['total']; ?></td>
			</tr>

		<?php
	}
	?>
		<?php
	}
	?>
	</table>

