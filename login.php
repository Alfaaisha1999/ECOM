<?php 

require('top.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	  window.location.href='index.php';
	</script>
	<?php
}
?>
<!-----main start----->
<main id="main" style="min-height:100vh;">
  <div class="center"><br><!--img class="responsive-img" style="width: 120px;hieght:50px;padding:0px;" src="media/logo/logo.png" /--></div>
  <div class="row">
  	<div class="col s12 m4 offset-m4">
  	  <div class="card">
          <div class="card-action b-light white-text">
	    		    <h5 class=" ">Login </h5>
  	    	</div>
        <div class="card-content">
          <div id="myalert"></div>
            <form action="#" method="post">
              <div class="input-field" >
                <label for="username"></label>
                <input id="login_email" type="text" name="username" class="validate" placeholder="Enter your Username" />
              </div><span class="field_error" id="login_email_error"></span><br>
              <span class="field_error" id="login_email_error"></span>
              <div class="input-field" >
                <label for="password"></label>
                <input id="login_password" type="password" name="password" class="validate" placeholder="Password"/>
              </div>
              <span class="field_error" id="login_password_error"></span>
            <div class="row" style="padding:0 10px;">
            <div class="login_msg left"><p></p></div>
                <label class="right">
                  <a class="pink-text" href="forgot_password.php"><b>Forgot Password?</b></a>
                </label>                   
              
            </div>

              <div class="input-field center">
                <button class="btn-large waves-effect b-light" onclick="user_login()" name="login" id="login">Login</button>
              </div><br>
            </form>
            <a href="signup.php"> Dont have a Account? SignUp Now! </a>
        </div>
          
  	  </div>
    </div>
  </div>
</main>   
<!-----end of main start----->
<?php require('footer.php')?>       
<!----------java/scripts----------->

</body>
</html>