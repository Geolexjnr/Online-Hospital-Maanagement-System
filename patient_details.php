<?php
include('funct.php');
?>
<html>
<head>

<html>
<head>

<title>Patient Details</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
 integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>


<body>

<div class="jumbotron" style="background:url('img/3.jpeg') no-repeat; background-size:cover; height:300px;"></div>

<div class="container">
	<div class="card">
		<div class="card-body" style="background-color:#3498DB;color:#ffffff;">
		<div class="row">
		<div class="col-md-1">
		<a href="admin-panel.php" class="btn btn-light">Back</a> 
		</div>
		
		<div class="col-md-3"><h3>Patient Details</h3></div>
		<div class="col-md-8">
		
		<form class="form-group" action="search_patient.php" method="post">
		<div class="row">
			
		<div class="col-md-10">
		
		<input type="text" name="search" class="form-control" placeholder="Enter Contact Number">
		</div>
		
		<div class="col-md-2">
		
		<input type="submit" name="patient_search" class="btn btn-light">
		</div>
		</div>
		</form>
		</div>
		</div>
		<div>
			<div class="card-body" style="background-color:#3498DB; color:#fffff;">
			
			<table class="table table-hover" style="color:white;">
			  <thead>
				<tr>
				  
				  <th scope="col">First Name</th>
				  <th scope="col">Last Name</th>
				  <th scope="col">Email Address</th>
				  <th scope="col">Contact</th>
				  <th scope="col">Doctor's Appointment</th>
				</tr>
			  </thead>
			  <tbody>
				
				<?php get_patient_details()?>
			  </tbody>
			</table>
						
			</div>
		</div>
	</div>

</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>