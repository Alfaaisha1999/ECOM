<?php

require('top.php');
if (isset($_GET['link'])) {
	
	$link=$_GET['link'];

if(isset($_POST['submit']))
{
	$password=($_POST['newpassword']);
        $query=mysqli_query($con,"select id from users where  link='$link' ");
        
    $ret=mysqli_num_rows($query);
    if($ret>0){
      $query1=mysqli_query($con,"update users set password='$password'  where  link='$link' ");
       if($query1)
   {
echo "<script>alert('Password successfully changed');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";

   }
     
    }
    }
}
?>
<!-----main start----->
<main id="main" style="min-height:100vh;">
	<div class="center"><br>
	
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
					
				 <form class="form-horizontal" method="post">


						<div class="form-group">
							<div class="col-xs-12">
								<input type="password" class="form-control" id="userpassword" name="confirmpassword"
									placeholder="New Password" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<input type="password" class="form-control" id="confirmword" name="newpassword"
									placeholder="Confirm Password" required>
							</div>
						</div>


						<div class="form-group account-btn text-center m-t-10">
							<div class="col-xs-12">
								<button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit"
									name="submit">Reset</button>
							</div>
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
	
	function checkpass() {
		if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
			alert('New Password and Confirm Password field does not match');
			document.changepassword.confirmpassword.focus();
			return false;
		}
		return true;
	} 
</script>
<!-----end of main start----->
<?php require('footer.php') ?>
<!----------java/scripts----------->
