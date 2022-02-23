<?php
include 'database.php';

$user_id = $_POST['user_id'];

$sql="DELETE FROM tbl_user WHERE user_id = $user_id";
 
mysqli_query($conn, $sql);
 

echo $sql;
/* close connection */
mysqli_close($conn);

?>