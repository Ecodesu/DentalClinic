<?php
	include 'database.php';
	$first_name = $_POST['first_name'];
	$last_name  = $_POST['last_name'];
    $user_name  = $_POST['user_name'];
	$contact    = $_POST['contact'];
    $password   = hash('ripemd160', $_POST['password']);
	$address    = $_POST['address'];
    $email      = $_POST['email'];
	// $city=$_POST['city'];
	$sql = "INSERT INTO tbl_user (user_first_name,user_last_name,user_name,user_contact_number,user_password,user_address,user_email,user_credential) 
	VALUES 
    ('$first_name','$last_name','$user_name','$contact','$password','$address','$email','patient')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("status"=>true));
	} 
	else {
		echo json_encode(array("status"=>false));
	}
	mysqli_close($conn);
?>

