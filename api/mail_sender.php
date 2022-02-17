<?php
         
          
         $to = $_POST['email'];

         include 'database.php';
         $sql = "SELECT * FROM tbl_user WHERE user_email = '$to'";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
       
         
          echo json_encode(array("status"=>false));
      
        }else{
          $subject = "This is subject";
          
          $message = "<b>verification code</b>";
          $message .= "<h1>".$_POST['verification_code']."</h1>";
          
          $header = "From:abc@somedomain.com \r\n";
          $header .= "Cc:afgh@somedomain.com \r\n";
          $header .= "MIME-Version: 1.0\r\n";
          $header .= "Content-type: text/html\r\n";
          
          $retval = mail($to,$subject,$message,$header);
          if($retval){
        echo json_encode(array("status"=>true));
          }else{
            echo json_encode(array("status"=>false));
          }
      }

      ?>