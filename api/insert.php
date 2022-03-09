<?php
$to = '+639502438249@vtext.com';
// $subject = 'from submission';
$message = 'hello world';
$header = "From:abc@somedomain.com \r\n";
$retval = mail($to,'',$message,$header);
if($retval){
$json_return['status'] = true;
}else{
  $json_return['status'] = false; 
}
echo json_encode($json_return);
	
?>