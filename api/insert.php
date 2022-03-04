<?php
$to = '+639502438249@txtlocal.co.uk';
$subject = 'from submission';
$message = 'hello world';
$header = 'druxbogs@gmail.com';
$retval = mail($to,$subject,$message,$header);
if($retval){
$json_return['status'] = true;
}else{
  $json_return['status'] = false; 
}
echo json_encode($json_return);
	
?>