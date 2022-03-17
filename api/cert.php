<?php
	include 'database.php';


$request_key = $_POST['request_key'];

if($request_key == 'insert'){

	$date = $_POST['date'];
	$title  = $_POST['title'];
    	$sql = "INSERT INTO tbl_doc_cert (cert_title,cert_date) 
		VALUES 
    	('$title','$date')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("status"=>true));
		} 
		else 
		{
			echo json_encode(array("status"=>false));
		}
		mysqli_close($conn);
	}
	else{
	$sql = "SELECT * FROM tbl_doc_cert";	
	$result = mysqli_query($conn,$sql);
	$arr = array();
	if(mysqli_num_rows($result) > 0){
		while($rows = mysqli_fetch_assoc($result)){
			array_push($arr, $rows);
		}
	}
	header('Content-type: application/json');
	echo json_encode($arr);
}
	
?>

