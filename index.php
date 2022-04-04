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
    
<!-- header section starts  -->

<header>

  

    <div id="menu" class="fas fa-bars"></div>

    <nav class="navbar">
        <a class="active" href="#home">home</a>
        <a href="#prevent">prevent</a>
        <a href="#symptoms">symptoms</a>
        <a href="#precautions">precautions</a>
        <a href="#hand-wash">hand-wash</a>
		<a href="hosppage.php">Hospitals(beds)</a>
		<!--- <a href="creport.php">Covid test Results</a> -->
		<a href="vacpage.php">Vaccines</a>
		
    </nav>

</header>

<!-- header section ends -->


<section class="cases" id="cases">

    <title>STATE-WISE COVID-19 CASES</title>
    <style media="screen">
        table{
			border-collapse:collapse;
			width:900px;
			margin-left:180px;
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
			padding:16px 15px;
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
		<th>RECOVERED</th>
		<th>DECEASED</th>
		<th>CONFIRMED</th>
		<!------<th>Last Updated Time</th>  ---!>
		<?php

$data= file_get_contents('https://api.covid19india.org/data.json');
$case=json_decode($data,true);

$scount= count($case['statewise']);
$i=1;
while($i<$scount){
	
	?>
	<tr>
	<td><?php echo $case['statewise'][$i]['state']?></td>
	<td><?php echo $case['statewise'][$i]['active']?></td>
	<td><?php echo $case['statewise'][$i]['recovered']?></td>
	<td><?php echo $case['statewise'][$i]['deaths']?></td>
	<td><?php echo $case['statewise'][$i]['confirmed']?></td>
	<!--- <td><?php echo $case['statewise'][$i]['lastupdatedtime']?></td>   ---!>
	
	</tr>
	<?php
	$i++;
}


?>
    </table>
</body>
</section>









<!-- home section starts  --

<section class="home" id="home">

    <div class="content">
        <h1>Prevention from Corona Virus</h1>
        <h3>stay home, stay safe</h3>
        <a href="#prevent" class="btn">how to prevent</a>
    </div>

</section>

<!-- home section ends -->



<!-- prevent section starts  -->

<section class="prevent" id="prevent">

    <h1 class="heading"> how to prevent virus </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pre-1.png" alt="">
            <h3>wash your place</h3>
            
        </div>

        <div class="box">
            <img src="images/pre-2.png" alt="">
            <h3>maintain distance</h3>
        </div>

        <div class="box">
            <img src="images/pre-3.png" alt="">
            <h3>don't touch face</h3>
        </div>

        <div class="box">
            <img src="images/pre-4.png" alt="">
            <h3>wash your hand</h3>
        </div>

        <div class="box">
            <img src="images/pre-5.png" alt="">
            <h3>use napkin</h3>
        </div>

        <div class="box">
            <img src="images/pre-6.png" alt="">
            <h3>wear a mask</h3>
        </div>

    </div>

</section>

<!-- prevent section ends -->

<!-- symptoms section starts  -->

<section class="symptoms" id="symptoms">

    <h1 class="heading">covid-19 symptoms</h1>

    <div class="column">

      

        <div class="box-container">

            <div class="box">
                <img src="images/sym2.png" alt="">
                <h3>Dry Cough</h3>
            </div>

            <div class="box">
                <img src="images/sym6.png" alt="">
                <h3>Sore Throat</h3>
            </div>

            <div class="box">
                <img src="images/sym7.png" alt="">
                <h3>Cold</h3>
            </div>

            <div class="box">
                <img src="images/sym1.png" alt="">
                <h3>Fever</h3>
            </div>

            <div class="box">
                <img src="images/sym4.png" alt="">
                <h3>Difficulty in Breathing</h3>
            </div>

            <div class="box">
                <img src="images/sym3.png" alt="">
                <h3>Fatigue</h3>
            </div>
			
			  <div class="box">
                <img src="images/sym5.png" alt="">
                <h3>Loss of Taste or Smell</h3>
            </div>

        </div>

    </div>

</section>

<!-- symptoms section ends -->

<!-- precautions section starts  -->

<section class="precautions" id="precautions">

    <h1 class="heading">take precautions against covid-19</h1>

    <div class="column">

        <div class="box-container">

            <h3 class="title">things you should DO</h3>

            <div class="box">
                <img src="images/do-img1.png" alt="">
                <div class="info">
                    <h3>wash your hand</h3>
                </div>
            </div>

            <div class="box">
                <img src="images/do-img2.png" alt="">
                <div class="info">
                    <h3>always wear a mask</h3>
                </div>
            </div>

            <div class="box">
                <img src="images/do-img3.png" alt="">
                <div class="info">
                    <h3>stay home during fever</h3>
                </div>
            </div>

        </div>

        <div class="box-container">

            <h3 class="title">things you should NOT DO</h3>

            <div class="box">
                <img src="images/dont-img1.png" alt="">
                <div class="info">
                    <h3>avoid close contact with animals</h3>
                </div>
            </div>

            <div class="box">
                <img src="images/dont-img2.png" alt="">
                <div class="info">
                    <h3>avoid close contact with peoples</h3>
                </div>
            </div>

            <div class="box">
                <img src="images/dont-img3.png" alt="">
                <div class="info">
                    <h3>avoid crowded area</h3>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- precautions section ends -->


<!-- hand-wash section starts  -->

<section class="hand-wash" id="hand-wash">

    <h1 class="heading">how to wash hand properly</h1>

    <div class="column">

        <div class="box-container">

            <div class="box">
                <img src="images/wash-a.png" alt="">
                <h3>water and soap</h3>
            </div>

            <div class="box">
                <img src="images/wash-b.png" alt="">
                <h3>palm to palm</h3>
            </div>

            <div class="box">
                <img src="images/wash-c.png" alt="">
                <h3>Between Fingurs</h3>
            </div>

            <div class="box">
                <img src="images/wash-d.png" alt="">
                <h3>Focus on Thumbs</h3>
            </div>

            <div class="box">
                <img src="images/wash-e.png" alt="">
                <h3>Back of Hands</h3>
            </div>

            <div class="box">
                <img src="images/wash-f.png" alt="">
                <h3>Focus on wrist</h3>
            </div>

        </div>

      

    </div>

</section>

<!-- hand-wash section ends -->



<!-- scroll top  -->

<a href="#cases" class="scroll-top">
    <img src="images/scroll-img.png" alt="">
</a>
















<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>