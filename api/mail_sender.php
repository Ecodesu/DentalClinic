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

    $message = '<html> <body align="center" style="background-color:#DFDFDF; margin:0 auto; padding:0; width:100%; ">';
$message .= '<div style="background-color:#dfdfdf;padding:0;margin:0 auto;width:100% text-align:center;">';
$message .= '<br><br>';
$message .=  '<table id="outertable" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family:Tahoma,Verdana,sans-serif; min-width:290px; border-radius: 4px; background-color: #ffffff; margin: 10px auto;" width="550">';
$message .= '<tr><td class="topborder" style="background-color: #065446; font-size: 8pt; border-radius: 4px 4px 0 0; padding: 10px; " >&nbsp;</td></tr>';
$message .= '<tr><td class="spacer" style="font-size: 5px;">&nbsp;</td></tr>';
$message .= '<img src="https://lh3.googleusercontent.com/g02cpz_3gZ9o4IWJLyqTFEF7J_Y7y2DKm-5gV16gkfJJ-cYWbiX2Uo6F5TCqWF_jJGG7R3U5E8crRxx3OCM2-staPlro0SM0JnaUbXdQZ4Mauef1euPv0NFmVuibY2xqzje5P9MPsQ=w2400" width = "450" height = "110" alt="PDClogo" style="text-align:center;"> <br>';
$message .=  '<tr>';
$message .= '<td class="title" style="color: #065446; font-family: Edmondsans, Arial, sans-serif; font-size: 20pt; font-weight: bold; text-align: center;" align="center"> REGISTRATION VERIFICATION CODE </td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td class="contents" style="padding: 2px 50px 3px 50px; font-size: 11pt; ">';
$message .= '<div style="margin-left: 40px; margin-right: 40px; color: #000000;">';
$message .= '<br> We have received a request to register an account. <br><br>';
$message .= 'Enter the following verification code to continue: <br>';
$message .= "<h1>".$_POST['verification_code']."</h1>";     
$message .=  '</div>';
$message .= '</td> </tr> <tr> </tr> </table> &nbsp; </td>';
$message .= '<tr><td class="spacer">&nbsp;</td></tr> </table>';
$message .= '<table id="outertable" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family:Tahoma,Verdana,sans-serif; min-width:290px;"width="550">';
$message .= '<tr class="legalfooter">';
$message .= '<td class="legal" style="color: #777777; font-family: Helvetica,Arial,sans-serif; font-size: 9pt; text-align: center;"> <br>';
$message .= '© 2022 Dr. Mila Patajo Dental Clinic . All rights reserved.';
$message .= '<br><br></td></tr></table><br><br></div></body>';




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