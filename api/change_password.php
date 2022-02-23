<?php
include 'database.php';
		
$user_id        = $_POST['user_id'];
$new_password   = hash('ripemd160', $_POST['new_password']);
$old_password   = hash('ripemd160', $_POST['old_password']);

$json_return = array();
$sql = "SELECT * FROM tbl_user WHERE user_id = '$user_id' AND user_password = '$old_password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    $sql = "UPDATE `tbl_user` 
	SET user_password='$new_password' WHERE user_id=$user_id";
	if (mysqli_query($conn, $sql)) {
        $json_return['message'] = 'Change password success';
	} 
	else 
    {
        $json_return['message'] = 'query error';
	}
}else{
    $json_return['message'] = 'old password not matched';
}

echo json_encode($json_return);
mysqli_close($conn);
?>