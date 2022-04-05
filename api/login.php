<?php
         
include 'database.php';

$user_name = $_POST['user_name'];
$password   = hash('ripemd160', $_POST['password']);
$sql = "SELECT * FROM tbl_user WHERE (user_name = '$user_name' OR user_email = '$user_name') AND user_password = '$password' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $json_return = array();
    while($row = $result->fetch_assoc()){
        $json_return['data']   = $row;
    }
    $json_return['status'] = true;
    
    echo json_encode($json_return);
}else{
    echo json_encode(array("status"=>false));
}

?>