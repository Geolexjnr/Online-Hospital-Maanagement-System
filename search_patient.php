<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
 integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<body>
<?php

include ('funct.php');

if(isset($_POST['patient_search'])){
	$contact=$_POST['search'];
	$query="select*from doctorapp where contact='$contact'";
	$result= mysqli_query($con,$query);
	
	echo"
	<div class='container-fluid'style='margin-top:50px;'>

	<div class='card'>
	<div class='card-body'><a href='patient_details.php' 
	class='btn btn-primary'>Back</a></div>
		<img src='img/backgroundlogin.png' class='card-img-top' style='width:1000; height:400';>
	<div class='card-body' style='background-color:#3498DB; color:#fffff;'>
			
			<table class='table table-hover' style='color:white;'>
			  <thead>
				<tr>
				  
				  <th>First Name</th>
				  <th>Last Name</th>
				  <th>Email Address</th>
				  <th>Contact</th>
				  <th>Doctor's Appointment</th>
				</tr>
			  </thead>
			  <tbody>";
	while($row=mysqli_fetch_array($result)){
	
	$fname=$row['fname'];
	$lname=$row['lname'];
	$email=$row['email'];
	$contact=$row['contact'];
	$docap=$row['docap'];
	echo " <tr>
      <td>$fname</td>
      <td>$lname</td>
	  <td>$email</td>
      <td>$contact</td>
      <td>$docap</td>
    </tr>";
	
	}
	echo"</tbody></table></div></div></div>";
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>