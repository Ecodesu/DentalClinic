<?php
include 'database.php';
$user_id = $_POST['user_id'];
if($user_id == null || $user_id == ''){
	$sql = "SELECT * FROM tbl_appointment";
}else{
	$sql = "SELECT * FROM tbl_appointment WHERE user_id = $user_id";
}

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