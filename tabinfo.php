<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispaly data</title>
    <style media="screen">
        table{
            border:1px solid black;
			border-collapse:collapse;
			width:750px;
			margin-left:400px;
			margin-top:50px;
        }
        th{
            border:1px solid black;
			font-size:20px;
			padding:6px
        }
		td{
			 border:1px solid black;
			 text-align:center;
			 
		}
    </style>    
</head>
<body>
<?php
    $host="localhost:3306";
    $user="root";
    $pass="Linga@349349";
    $db="sample";

    $conn=mysqli_connect($host,$user,$pass,$db);

?>  
    <table>
        <th>Name</th>
        <th>USN</th>
		<?php
		$sql="SELECT * FROM test";
		$query=mysqli_query($conn,$sql);
		$nums=mysqli_num_rows($query);
		
		
		while($res=mysqli_fetch_array($query)){
			?>
			<tr>
			 <td><?php echo $res['name']; ?></td>
			 <td><?php echo $res['usn']; ?></td>
			</tr>
			<?php
		}
	  ?>
    </table>
</body>
</html>