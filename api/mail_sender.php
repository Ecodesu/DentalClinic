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

    $message = '<html><body style=" display: flex; min-height: 100vh; align-items: center; justify-content: center; background: #F4F7FF; ">';
    $message .= '<div style = "max-width: 550px; margin: 0 20px; background: white; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); padding: 40px 40px; border-radius: 12px; align-items: center; text-align:center;">';

    $message .= '<img src="https://lh3.googleusercontent.com/g02cpz_3gZ9o4IWJLyqTFEF7J_Y7y2DKm-5gV16gkfJJ-cYWbiX2Uo6F5TCqWF_jJGG7R3U5E8crRxx3OCM2-staPlro0SM0JnaUbXdQZ4Mauef1euPv0NFmVuibY2xqzje5P9MPsQ=w2400" width = "450" height = "110" alt="PDClogo"> <br>';

    $message .= '<p class ="head" style="font-size: 25px; font-weight: 400; text-align: justify; margin-top: 40px;"><b> We have received a request to register an account. </b></p>';

    $message .= '<p class = "message" style= "margin-top: 20px; font-size: 16px; font-weight: 400; text-align: justify;"> Enter the following verification code to continue:</p>';

    $message .= "<h1>".$_POST['verification_code']."</h1>";
    $message .= "</div>";
    $message .= "</body></html>";


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
            
    $message = "<b>We have received a request to reset your password. Enter the following verification code: </b>";
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