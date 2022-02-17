<?php



include 'database.php';
$request_type = $_POST['request_type'];

if($request_type == 'verification'){
  $to = $_POST['email'];
  $sql = "SELECT * FROM tbl_user WHERE user_email = '$to'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo json_encode(array("status"=>false));
  }
  else
  {
    $subject = "This is subject";
              
    $message = "<b>verification code</b>";
    $message .= "<h1>".$_POST['verification_code']."</h1>";

    $header = "From:abc@somedomain.com \r\n";
    $header .= "Cc:afgh@somedomain.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
  }
}
elseif($request_type == 'contact_us'){
  $to = 'patajo.dentalclinic@gmail.com';

  $subject = "Message from ms/mr,".$_POST['name'];
              
  $message = "<b>User concern</b>";
  $message .= "<p>".$_POST['message']."</p>";
  $message .= "<h1>Email:".$_POST['email']."</h1>";

  $header = "From:".$_POST['email']."\r\n";
  $header .= "Cc:afgh@somedomain.com \r\n";
  $header .= "MIME-Version: 1.0\r\n";
  $header .= "Content-type: text/html\r\n";
}
$retval = mail($to,$subject,$message,$header);
if($retval){
  echo json_encode(array("status"=>true));
}else{
  echo json_encode(array("status"=>false));
}
      

      ?>