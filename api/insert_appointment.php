<?php
	include 'database.php';
    $ref_no         = $_POST['ref_no'];
	$main_concern   = $_POST['main_concern'];
    // $schedule       = $_POST['schedule'];
    $user_id        = $_POST['user_id'];
    $time           = $_POST['time'];
    $date           = $_POST['date'];

	$sql = "INSERT INTO tbl_appointment (ref_no,main_concern,user_id,date,time,status) 
	VALUES 
    ('$ref_no','$main_concern','$user_id','$date','$time','Pending')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("message"=>"submit success. wait for doctor approval"));
	} 
	else {
		echo json_encode(array("status"=>"query error"));
	}
	mysqli_close($conn);
?>

