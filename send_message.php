<?php
require('include/connection.php');
require('include/functions.php');
// $name=get_safe_value($con,$_POST['name']);
// $email=get_safe_value($con,$_POST['email']);
// $mobile=get_safe_value($con,$_POST['mobile']);
// $comment=get_safe_value($con,$_POST['message']);
// $added_on=date('Y-m-d h:i:s');
// mysqli_query($con,"insert into contact_us(name,email,mobile,comment,added_on) values('$name','$email','$mobile','$comment','$added_on')");
// echo "Thank you";


if (isset($_POST['submit'])) {
    // getting Post values
    $name = get_safe_value($con, $_POST['name']);
    $email = get_safe_value($con, $_POST['email']);
    $mobile = get_safe_value($con, $_POST['mobile']);
    $comment = get_safe_value($con, $_POST['message']);

    // $uip = $_SERVER['REMOTE_ADDR'];
    // date_default_timezone_set('Asia/Kolkata');
    // date_default_timezone_get();
    $added_on = date('Y-m-d h:i:s');


    $responseText = [];

    // Insert quaery 
    $query = mysqli_query($con, "insert into contact_us(`name`, `email`, `mobile`, `comment`, `added_on`) values('$name','$email','$mobile','$comment','$added_on')");
    if ($query) {
        $responseText = array('massege' => 'MESSEGE_SENT', );

        $html = "<div>
            <div><b>Name:</b> $name,</div>
            <div><b>Phone Number:</b> $mobile,</div>
            <div><b>Email Id:</b> $email,</div> 
            <div style='padding-top:8px;'><b>Message :</b>$comment</div>
         </div>";
        include('Mail/phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Username = "aishashiekh1999@gmail.com";
        $mail->Password = "ryhodfwbvtakwslt";
        $mail->SetFrom("capablehub2023@gmail.com");
        $mail->addAddress("capablehub2023@gmail.com");
        $mail->isHTML(true);
        $mail->Subject = $name.' Sent Contact Message ';
        $mail->Body = $html;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            )
        );
        if ($mail->send()) {
            $responseText = array('mail' => 'SENT', );
             echo $responseText['mail'];
            
            // echo "right";
        } else {
            $responseText = array('mail' => 'ERROR', );
            echo ($responseText['mail']);
        }
    } 
    // else {
    //     echo "Email id not registered with us";
    //     die();
    // }
}
// echo json_encode($responseText);
// echo "MASSEGE:SENT";
//mail function for sending mail
// $to = 'capablehub2023@gmail.com';
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
// $headers .= "From:" . $email . "\r\n";
// $subject = 'Contact From'. $name;
// $body = "<html>
// </body>
//     <div>
//         <div><b>Name:</b> $name,</div>
//         <div><b>Phone Number:</b> $mobile,</div>
//         <div><b>Email Id:</b> $email,</div> 
//         <div style='padding-top:8px;'><b>Message :</b>$comment</div>
//     </div>
// </body>
// </html>";

// if(mail($to, $subject, $comment)) {
//mail function for replying  mail to user
//  $responseText = array('mail' => 'SENT', );
//  echo json_encode($responseText);
// echo "MAIL_SENT";

//     $to = "echo '$email'";
//     $sub = "welcome '$name' You For contact Us";
//     $headers .= "MIME-Version: 1.0" . "\r\n";
//     $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
//     $headers .= "From:no-reply@capablehub.in " . "\r\n";
//     $headers .= "Reply-To:capablehub2023@gmail.com" . "\r\n";
//     $messagebody .= ' <html><body> 
//     <h1>Thanks you ' . $name . ' for Contact us!</h1> 
// <p>We Will Get Back to You soon! for you valuable Responce. Enjoy Services <a href="https://www.capablehub.in">Clic Here!</a>  And explore capablehub.</p>
// </body> 
// </html>';

// $mail = mail($to, $sub, $messagebody, $headers);

// if (($mail) > 0) {
//     $responseText = array('mail' => 'SENT', );
//  echo json_encode($responseText);
// }
// } else {
//     $responseText = array('mail' => 'ERROR', );
//  echo json_encode($responseText);
// }
// } else {
//     $responseText = array('massege' => 'ERROR', );
//  echo json_encode($responseText);
// }
//}
?>