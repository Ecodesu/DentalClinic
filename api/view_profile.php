<?php
         
include 'database.php';

$user_id = $_POST['user_id'];
$sql = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
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