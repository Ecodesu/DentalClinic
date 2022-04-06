<?php
	include 'database.php';
    $ref_no         = $_POST['ref_no'];
	$main_concern   = $_POST['main_concern'];
    // $schedule       = $_POST['schedule'];
    $user_id        = $_POST['user_id'];
    $time           = $_POST['time'];
    $date           = $_POST['date'];





	$sql = "SELECT * FROM tbl_appointment WHERE date = '$date' AND time = '$time'";
	$result = mysqli_query($conn,$sql);
	$arr = array();
	if(mysqli_num_rows($result) > 0){
		echo json_encode(array("message"=>"Date and Time already occupied",
											"status"=>false));
	}else{
		$sql = "INSERT INTO tbl_appointment (ref_no,main_concern,user_id,date,time,status) 
		VALUES 
		('$ref_no','$main_concern','$user_id','$date','$time','Pending')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("message"=>"Submit Success! Wait for doctor's approval",
									"status"=>true));
		} 
		else {
			echo json_encode(array("status"=>"query error"));
		}
	}
	mysqli_close($conn);
?>

