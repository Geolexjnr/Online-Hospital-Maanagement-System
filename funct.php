<?php
include 'Connect.php';
if(isset($_POST['login-submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql = "SELECT * FROM login where username='$username' and password='$password'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result)==1)
	{
		
		header("Location:admin-panel.php");
		
		
	}else{
		
			echo "<script>alert('Enter correct details.')</script>";
			echo "<script>window.open('index.php','_self')</script>";

	}
}

if(isset($_POST['pat_submit'])){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$docap=$_POST['docap'];
	$query="insert into doctorapp(fname,lname,email,contact,docap)
	values('$fname','$lname', '$email', '$contact', '$docap')";
	$result=mysqli_query($con,$query);
	if($result){
		echo "<script>alert('Appointment succesfuly created.')</script>";
		echo "<script>window.open('admin-panel.php','_self')</script>";
	}else{
		
		echo "<script>alert('Appointment creation failed.')</script>";
		echo "<script>window.open('admin-panel.php','_self')</script>";
		
	}
}

function get_patient_details(){

global $con;
$query="select*from doctorapp";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){
	$fname=$row['fname'];
	$lname=$row['lname'];
	$email=$row['email'];
	$contact=$row['contact'];
	$docap=$row['docap'];
	
	echo"
	<tr>
	  <td>$fname</td>
	  <td>$lname</td>
	  <td>$email</td>
	  <td>$contact</td>
	  <td>$docap</td>
	</tr>";
	
}
}
?>