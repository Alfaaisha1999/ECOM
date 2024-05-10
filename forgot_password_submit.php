<?php
require('include/connection.php');
require('include/functions.php');

$email=get_safe_value($con,$_POST['email']);
$res=mysqli_query($con,"select * from users where email='$email'");
$check_user=mysqli_num_rows($res);

if($check_user>0){
	// $res=mysqli_query($con,"insert into users where email='$email'");
	$link=md5(uniqid(true));

	$query=mysqli_query($con,"UPDATE `users` SET `link`='$link' where email='$email' ");

	$html='reset your password following this link <a href="http://localhost/php/ecom/reset.php?link='.$link.'">Click to Reset password</a>';
	include('Mail/phpmailer/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="aishashiekh1999@gmail.com";
	$mail->Password="ryhodfwbvtakwslt";
	$mail->SetFrom("aishashiekh1999@gmail.com");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject="Your Password";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "We have sent you a reset Password link on your email id.";
	}else{
		echo "Error occur";
	}
}else{
	echo "Email id not registered with us";
	die();
}
?>
