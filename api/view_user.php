<?php
include 'database.php';
// $user_id = $_POST['user_id'];
$request_key = $_POST['request_key'];
if($request_key == 'admin'){
	$search = $_POST['search'];
    $sql = "SELECT * FROM tbl_user WHERE user_credential != 'patient' AND (user_name LIKE '$search%' OR user_credential = '$search') AND last_active > (NOW() - INTERVAL 1 YEAR)";
}
else if($request_key == 'patient'){
	$search = $_POST['search'];
	$sql = "SELECT * FROM tbl_user WHERE user_credential = 'patient' AND (user_name LIKE '$search%' OR user_first_name LIKE '%$search%' OR user_last_name LIKE '$search%' OR user_email LIKE '$search%' OR user_contact_number LIKE '$search%') AND last_active > (NOW() - INTERVAL 1 YEAR)";
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