<?php
include 'database.php';
		
$user_name  = $_POST['user_name'];
$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$contact    = $_POST['contact'];

$user_id    = $_POST['user_id'];
if(isset($_POST['email'])){
	$email    = $_POST['email'];
	$sql = "UPDATE `tbl_user` 
	SET user_name='$user_name',
        user_first_name='$first_name',
        user_last_name='$last_name',
        user_contact_number='$contact',
        user_email ='$email' WHERE user_id=$user_id";
}else{
	$address = $_POST['address'];
	$sql = "UPDATE `tbl_user` 
	SET user_name='$user_name',
        user_first_name='$first_name',
        user_last_name='$last_name',
        user_contact_number='$contact',
        user_address ='$address' WHERE user_id=$user_id";
}
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("status"=>true));
	} 
	else {
		echo json_encode(array("status"=>false));
	}
	mysqli_close($conn);
?>