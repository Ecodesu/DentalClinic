<?php
include 'database.php';

$sql = "SELECT * FROM tbl_appointment LEFT JOIN tbl_user ON tbl_user.user_id = tbl_appointment.user_id";	


$result = mysqli_query($conn,$sql);
$arr = array();
if(mysqli_num_rows($result) > 0){
	while($rows = mysqli_fetch_assoc($result)){
		array_push($arr, $rows);
	}
}
header('Content-type: application/json');
echo json_encode($arr);

?>