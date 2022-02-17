<?php
         
include 'database.php';

$user_name = $_POST['user_name'];
$password   = hash('ripemd160', $_POST['password']);
$sql = "SELECT * FROM tbl_user WHERE user_name = '$user_name' AND user_password = '$password' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo json_encode(array("status"=>true));
}else{
    echo json_encode(array("status"=>false));
}

?>