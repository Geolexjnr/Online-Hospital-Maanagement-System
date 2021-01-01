<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$dbdatabase = "hmsdb";

$con = mysqli_connect($db_host,$db_user, $db_password);
if(!$con){
	echo "not connected to the database";
}else {
	
}
$dbselect = mysqli_select_db($con,$dbdatabase);

?>