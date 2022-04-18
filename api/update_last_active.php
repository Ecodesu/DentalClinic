<?php
	include 'database.php';
	$user_id = $_POST['user_id'];
	$date = date('Y-m-d');
	$sql = "UPDATE tbl_user SET last_active ='$date' WHERE user_id = '$user_id'";
	if (mysqli_query($conn, $sql)) {
	    echo "updated";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    

?>