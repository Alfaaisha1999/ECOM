<?php
require('include/connection.php');
require('include/functions.php');

$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$password=get_safe_value($con,$_POST['password']);
$check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
$check_mobile=mysqli_num_rows(mysqli_query($con,"select * from users where mobile='$mobile'"));
if($check_user>0){
	echo "email_present";
}elseif($check_mobile>0){
	echo "mobile_present";
}else{
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into users(name,email,mobile,password,added_on) values('$name','$email','$mobile','$password','$added_on')");
	$res=mysqli_query($con,"select * from users where email='$email' and password='$password'");
$check_user=mysqli_num_rows($res);
	if ($check_user > 0) {
		$row = mysqli_fetch_assoc($res);
		$_SESSION['USER_LOGIN'] = 'yes';
		$_SESSION['USER_ID'] = $row['id'];
		$_SESSION['USER_NAME'] = $row['name'];
	}
	echo "insert";
}

// $check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
// if($check_user>0){
// 	echo "email_present";
// }else{
// 	$added_on=date('Y-m-d h:i:s');
// 	$insertdata=mysqli_query($con,"insert into users(name,email,mobile,password,added_on) values('$name','$email','$mobile','$password','$added_on')");
	
// $res=mysqli_query($con,"select * from users where email='$email' and password='$password'");
// $check_user=mysqli_num_rows($res);
// if($check_user>0){
// 	$row=mysqli_fetch_assoc($res);
// 	$_SESSION['USER_LOGIN']='yes';
// 	$_SESSION['USER_ID']=$row['id'];
// 	$_SESSION['USER_NAME']=$row['name'];
// 	echo "valid";
// }
// 		echo "insert";
		
// }
?>