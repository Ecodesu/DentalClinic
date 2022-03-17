<?php
$password = hash('ripemd160', $_POST['password']);
echo json_encode($password);
	
?>