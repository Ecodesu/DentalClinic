<?php
include 'database.php';
// $user_id = $_POST['user_id'];
$request_key = $_POST['request_key'];
if($request_key == 'admin'){
    $sql = "SELECT * FROM tbl_user WHERE user_credential != 'patient'";
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