<?php

require('top.php');

?>
<!-----main start----->
<main id="main" style="min-height:100vh;">
	<div class="center"><br>
		<!--img class="responsive-img" style="width: 120px;hieght:50px;padding:0px;" src="media/logo/logo.png" /-->
	</div>
	<div class="row">
		<div class="col s12 m4 offset-m4">
			<div class="card">
				<div class="card-action b-light white-text">

				</div>
				<div class="card-content">
					<h5 class="center">Forgot Password</h5>
					<div id="myalert"></div>
					<h6>Enter Your Email</h6>
					<form id="login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
										</div>
										<span class="field_error" id="email_error"></span>
									</div>
									
									<div class="contact-btn">
										<button type="button" class="btn" onclick="forgot_password()" id="btn_submit">Submit</button>
										
									</div>
								</form>
					
					<div class="form-output login_msg">
						<p class="form-messege field_error"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script>
	function forgot_password(){
			jQuery('#email_error').html('');
			var email=jQuery('#email').val();
			if(email==''){
				jQuery('#email_error').html('Please enter email id');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'forgot_password_submit.php',
					type:'post',
					data:'email='+email,
					success:function(result){
						jQuery('#email').val('');
						jQuery('#email_error').html(result);
						jQuery('#btn_submit').html('Submit');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
	// function checkpass() {
	// 	if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
	// 		alert('New Password and Confirm Password field does not match');
	// 		document.changepassword.confirmpassword.focus();
	// 		return false;
	// 	}
	// 	return true;
	// } 
</script>
<!-----end of main start----->
<?php require('footer.php') ?>
<!----------java/scripts----------->
