<?php
	include 'database.php';
	$user_id = $_POST['user_id'];
	$role = $_POST['role'];
	$sql = "UPDATE tbl_user SET user_credential ='$role' WHERE user_id = '$user_id'";
	if (mysqli_query($conn, $sql)) {
	    echo "New record inserted successfully Done";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

?>