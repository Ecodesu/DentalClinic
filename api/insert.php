<?php
	include 'database.php';
	$user_name=  $_POST['user_name'];
	$password= $_POST['password'];
	// $phone= $_POST['phone'];
	// $city=$_POST['city'];
	$sql = "INSERT INTO tbl_user ( user_name, user_password, user_credential) 
	VALUES ('$user_name','$password','admin')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>