<?php
include 'database.php';
		
$user_email  = $_POST['email'];
$password = hash('ripemd160', $_POST['password']);

$json_return = array();
$sql = "UPDATE `tbl_user` 
SET user_password='$password' WHERE user_email='$user_email'";
if (mysqli_query($conn, $sql)) {
    $json_return['status'] = true;
    $json_return['message'] = 'change password success';
} 
else 
{   
    $json_return['status'] = false;
    $json_return['message'] = 'query error';
}

echo json_encode($json_return);
mysqli_close($conn);
?>