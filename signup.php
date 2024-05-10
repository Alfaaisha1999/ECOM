<?php 
require('top.php');
?>
<!-----main start----->
<main id="main" style="min-height:100vh;">
  <div class="center"><br></div>
    <section>
      <div class="row">
        <div class="col s12 m4 offset-m4">
        <!-----Signup form start----->
          <div class="card">
              <div class="card-action b-light white-text">
                  <h5 class=" ">Sign Up </h5>
              </div>
              <div class="card-content">
                <div id="myalert"></div>
              <form  name="form1" method="post" id="register-form" autocomplete="off">
                <div class="input-field">
                      <label for="name">Enter your Name</label>
                      <input class="validate" type="text" name="name" id="name" />
                      <span class="error" id="nameError" required></span>
                    </div>
                <div class="input-field">
                      <label for="email">Enter your Email</label>
                      <input class="validate" type="text" name="email" pattern = "^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" />
                      <span class="error" id="emailError" required></span>
                    </div>
                <div class="input-field">
                      <label for="mobile">Enter your Mobile</label>
                      <input class="validate" type="tel" name="mobile" maxlength="10"  pattern="[6789][0-9]{9}" id="mobile" />
                      <span class="error" id="mobileError" required></span>
                    </div>
                <div class="input-field">
                      <label for="password">Creat your Password</label>
                      <input class="validate" type="password" name="password" id="password" />
                      <span class="error" id="passwordError" required></span>
                    </div>
    
                <div class="input-field center">
                      <button class="btn-large b-light waves-effect"  type="submit" name="signup" id="btn_register">Sign Up</button>
                </div>
                <div class="register_msg"><p></p></div>
                <br>
              </form>
              <a href="login.php" title="Already Registered go to Login" class="ngl btn-floating btn-large b-light waves-effect waves-light red"><i class="material-icons">input</i></a>
              </div>
              
          </div>
        </div>
      </div>
    
    </section>
    
</main>   

<script>
</script>
<!-----end of main start----->
<?php require('footer.php')?>       
<!----------java/scripts----------->
