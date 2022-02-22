<?php



include 'database.php';
$request_type = $_POST['request_type'];
$to = $_POST['email'];
$result = true;
$json_return = array();
if($request_type == 'verification')
{
  
  $sql = "SELECT * FROM tbl_user WHERE user_email = '$to'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $json_return['status'] = false;
    $result = false;
  }
  else
  {
    $subject = "Patajo Dental Clinic Verification Code";
              
    $message = "<img src="LOGO.png"><br><b>We have received a request to reset your password. Enter the following verification code: </b>";
    $message .= "<h1>".$_POST['verification_code']."</h1>";
    $message .= "haha"

    $header = "From:abc@somedomain.com \r\n";
    $header .= "Cc:afgh@somedomain.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
  }
}
elseif($request_type == 'contact_us')
{
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
elseif($request_type == 'forgot_password')
{
  $sql = "SELECT * FROM tbl_user WHERE user_email = '$to'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $subject = "Patajo Dental Clinic Verification Code";
            
    $message = "<img src="LOGO.png"><br><b>We have received a request to reset your password. Enter the following verification code: </b>";
    $message .= "<h1>".$_POST['verification_code']."</h1>";

    $header = "From:abc@somedomain.com \r\n";
    $header .= "Cc:afgh@somedomain.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    
    $json_return['message'] = 'verification code sent';
  }
  else
  {
    $result = false;
    $json_return['message'] = 'your Email not yet registered';
    $json_return['status'] = false;
  }
}


if($result){
  $retval = mail($to,$subject,$message,$header);
  if($retval){
  $json_return['status'] = true;
  }else{
    $json_return['status'] = false; 
  }
}
echo json_encode($json_return)
      

      ?>