<?php
	include 'database.php';
	$feedback =  $_POST['feedback'];
	
	
	
	$sql = "INSERT INTO tbl_feedback (feedback_message) 
	VALUES ('$feedback')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("message"=>"feedback sent",
                                "status"=>true));
	} 
	else 
    {
		echo json_encode(array("message"=>"feedback not sent",
                                "status"=>false));
	}
	mysqli_close($conn);
?>