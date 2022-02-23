<?php
	include 'database.php';
	$app_id = $_POST['app_id'];
	$status = $_POST['status'];
	$sql = "UPDATE tbl_appointment SET status ='$status' WHERE appointment_id = '$app_id'";
	if (mysqli_query($conn, $sql)) {
	    echo "New record inserted successfully Done";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

?>