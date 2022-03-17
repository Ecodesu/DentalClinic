<?php
include 'database.php';

$email  = $_POST['Email'];
$contact    = $_POST['contact'];

	$sql = "UPDATE `tbl_user` 
	SET user_email='$email',
        user_contact_number='$contact' WHERE user_credential='Admin'";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("status"=>true));
	} 
	else {
		echo json_encode(array("status"=>false));
	}
	mysqli_close($conn);
?>