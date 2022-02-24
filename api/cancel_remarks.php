<?php
	include 'database.php';
    $request_key = $_POST['request_key'];
    $app_id         = $_POST['app_id'];
    if($request_key == 'insert'){
    
	$remarks   = $_POST['remarks'];
    // $schedule       = $_POST['schedule'];

	$sql = "INSERT INTO tbl_remarks (app_id,remarks_message) 
	VALUES 
    ('$app_id','$remarks')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("message"=>"submit success. wait for doctor approval"));
	} 
	else {
		echo json_encode(array("status"=>"query error"));
	}
	mysqli_close($conn);
    }
    else if($request_key == 'show'){
        
        $sql = "SELECT * FROM tbl_remarks WHERE app_id = '$app_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $json_return = array();
            while($row = $result->fetch_assoc()){
                $json_return['data']   = $row;
            }
            $json_return['status'] = true;
            
            echo json_encode($json_return);
        }else{
            echo json_encode(array("status"=>false));
        }
    }
?>