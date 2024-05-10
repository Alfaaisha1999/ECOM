<?php
require('top.php');
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
  ?>
  <script>
    window.location.href = 'index.php';
  </script>
  <?php
}

$cart_total = 0;

if (isset($_POST['submit'])) {
  $address = get_safe_value($con, $_POST['address']);
  $fname = get_safe_value($con, $_POST['fname']);
  $mobil = get_safe_value($con, $_POST['mobil']);
  $city = get_safe_value($con, $_POST['city']);
  $pincode = get_safe_value($con, $_POST['pincode']);
  $payment_type = get_safe_value($con, $_POST['payment_type']);
  $user_id = $_SESSION['USER_ID'];
  foreach ($_SESSION['cart'] as $key => $val) {
    $productArr = get_product($con, '', '', $key);
    $price = $productArr[0]['price'];
    $qty = $val['qty'];
    $cart_total = $cart_total + ($price * $qty);

  }
  $total_price = $cart_total;
  $payment_status = 'pending';
  if ($payment_type == 'cod') {
    $payment_status = 'success';
  }
  $order_status = '1';
  $added_on = date('Y-m-d h:i:s');


  mysqli_query($con, "insert into `order`(user_id,fname,mobil,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price) values('$user_id','$fname','$mobil','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price')");

  if(isset($_SESSION['COUPON_ID'])){
		$coupon_id=$_SESSION['COUPON_ID'];
		$coupon_code=$_SESSION['COUPON_CODE'];
		$coupon_value=$_SESSION['COUPON_VALUE'];
		$total_price=$total_price-$coupon_value;
		unset($_SESSION['COUPON_ID']);
		unset($_SESSION['COUPON_CODE']);
		unset($_SESSION['COUPON_VALUE']);
	}else{
		$coupon_id='';
		$coupon_code='';
		$coupon_value='';	
	}	
	
  mysqli_query($con,"insert into `order`(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price,txnid,coupon_id,coupon_code,coupon_value) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price','$txnid','$coupon_id','$coupon_code','$coupon_value')");
	
	 

  $order_id = mysqli_insert_id($con);

  foreach ($_SESSION['cart'] as $key => $val) {
    $productArr = get_product($con, '', '', $key);
    $price = $productArr[0]['price'];
    $qty = $val['qty'];

    mysqli_query($con, "insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
  }

  unset($_SESSION['cart'])
    ?>
  <script>
    window.location.href = 'thank_you.php';
  </script>
  <?php

}

?>

<!--Main content section start here-->
<main class="main" style="min-height: 100vh;">
  <div class="row" id="ecommerce-products">
    <div class="container">

      <div class="row">
        <div class="accordion">
          <?php
          $accordion_class = 'accordion__title';
          if (!isset($_SESSION['USER_LOGIN'])) {
            $accordion_class = 'accordion__hide';
            ?>
            <div class="col l6 s12 m6 ">

              <div class="card-action  black-text">
                <h5 class=" ">Login </h5>
              </div>
              <div class="card-content">
                <div id="myalert"></div>
                <form action="#" method="post">
                  <div class="input-field">
                    <label for="username"></label>
                    <input id="login_email" type="text" name="username" class="validate"
                      placeholder="Enter your Username" />
                  </div><span class="field_error" id="login_email_error"></span><br>
                  <span class="field_error" id="login_email_error"></span>
                  <div class="input-field">
                    <label for="password"></label>
                    <input id="login_password" type="password" name="password" class="validate" placeholder="Password" />
                  </div>
                  <span class="field_error" id="login_password_error"></span>
                  <div class="row" style="padding:0 10px;">
                    <div class="login_msg left">
                      <p></p>
                    </div>
                    <label class="right">
                    <a class="mt-2 fontpara modal-trigger"
                                href="#modal8"><b>Create an account</b></a>
                      <!-- <a class="black-text" href="forgetpass.html"><b>Forgot Password?</b></a> -->
                    </label>

                  </div>

                  <div class="input-field center">
                    <button class="btn waves-effect blue " onclick="user_login()" name="login" id="login">Login</button>
                  </div><br>
                </form>

              </div>


            </div>


  <!--card class-->
        <!-- Modal Structure -->
        <div id="modal8" class="modal">
            <div class="modal-content pt-2">
              <div class="row" id="product-one">
                <div class="col s12">
                  <a class="modal-close right"><i class="material-icons">close</i></a>
                </div>
 
              <!-----Signup form start----->

              <div class="card-action black-text">
                <h5 class=" ">Sign Up </h5>
              </div>
              <div class="card-content">
                <div id="myalert"></div>
                <form  name="form1" method="post" id="register-form">
                <div class="input-field">
                      <label for="name">Enter your Name</label>
                      <input class="validate" type="text" name="name" id="name" required />
                      <span class="field_error" id="nameError"></span>
                    </div>
                <div class="input-field">
                      <label for="email">Enter your Email</label>
                      <input class="validate" type="email" name="email" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  id="email" required/>
                      <span class="field_error" id="emailError" ></span>
                    </div>
                <div class="input-field">
                      <label for="mobile">Enter your Mobile</label>
                      <input class="validate" type="tel" onkeyup="validatePhoneNumber()" name="mobile" maxlength="10"  pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" id="mobile" required>
                      <span class="field_error" id="mobileError"></span>
                    </div>
                <div class="input-field">
                      <label for="password">Creat your Password</label>
                      <input class="validate" type="password" name="password" id="password" required/>
                      <span class="field_error" id="passwordError" ></span>
                    </div>
    
                <div class="input-field center">
                      <button class="btn-large b-light waves-effect " onclick="user_register()" type="submit" name="signup" id="btn_register">Sign Up</button>
                </div>
                <div class="register_msg"><p></p></div>
                <br>
              </form>
              </div>
     
              </div>
            </div>
          </div>
          <!-- Modal Structure ends-->
        </div>
          </div>


        </div>
      <?php } ?>
          <div class="accordion__body">
         
              
              </div>
            <div class="<?php echo $accordion_class ?>">
                checkout process
              </div>

        
              <div class="accordion__body">
                
              <div class="row">
        <div class="col l8 m4 s12">
                  <div class="single-method">

                  <form method="post" class="display-grid" id="adpost">
                  <div class="single-input">
                        <input type="text" name="fname" placeholder="Full Name" required>
                      </div>
                      <div class="single-input">
                        <input type="tel" name="mobil"  maxlength="10" placeholder="Mobile Number" pattern="[6789][0-9]{9}" class="validate" required>
                      </div>
                      <div class="single-input">
                        <input type="text" name="address" placeholder="Street Address" required>
                      </div>
                    
              
                      <div class="single-input">
                        <input type="text" name="city" placeholder="City/State" required>
                      </div>
                 
                  
                      <div class="single-input">
                        <input type="text" maxlength="6"  pattern="[0-9]{6}"  name="pincode" placeholder="Post code/ zip" class="validate" required>
                      </div>
                    

                  </div>
                    <label class="mt-2 ">
                      <input type="radio" name="payment_type" value="COD" />
                      <span><i class="material-icons vertical-align-bottom blue text-lighten-5"> </i>
                      <span class="fontpara">COD</span>  </span>
                    </label>
                    <label class="mt-3">
                      <input type="radio" name="payment_type" value="payu" />
                      <span><i class="material-icons black-text"> </i><span class="fontpara">UPI</span></span>
                    </label>
                    <div>
                      <input class="btn-small b-light white-text " type="submit" name="submit" />
                    </div>
                  </form>
                  </div>

                 
                  <div class="col l6 m4 s12 mt-2  pr-0 grey lighten-2 ">
          <div class="order-details">
            <h5 class="order-details__title">Your Order</h5>
            <div class="order-details__item fontpara">
              <?php
              $cart_total = 0;
              foreach ($_SESSION['cart'] as $key => $val) {
                $productArr = get_product($con, '', '', $key);
                $pname = $productArr[0]['name'];
                $mrp = $productArr[0]['mrp'];
                $price = $productArr[0]['price'];
                $image = $productArr[0]['image'];
                $qty = $val['qty'];
                $rate = $price * $qty;
                $gst = $rate * 18 / 100;
                $cart_total = $cart_total + $rate + $gst;
                ?>
                <div class="single-item">
                  <div class="single-item__thumb">
                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>" height="50" width="50" />
                  </div>
                  <div class="fontpara">
                    <a class="fontpara" href="#">
                      <?php echo $pname ?>
                    </a><br>
                    <span class="price">
                      <?php echo $rate + $gst ?>
                    </span>
                    <br>
                  </div>
                  <div class="single-item__remove">
                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><i
                        class="material-icons left">delete</i></a>
                  </div>
                </div>
              <?php } ?>
            </div>
            <br>
            <br>
            <div class="fontpara" id="coupon_box">
                                <h5>Coupon Value</h5>
                                <span class="price" id="coupon_price"></span>
                            </div>
                            <br>
                            <div class="fontpara">
                                <h5>Order total</h5>
                                <span class="price" id="order_total_price"><?php echo $cart_total?></span>
                            </div>
                            <br>
							<div class="fontpara">
                                <input type="textbox" id="coupon_str" class="fontpara  border-order"/> 
                <input type="button" name="submit" class=" coupon_style-btn  border-order-btn b-light white-text" value="Apply Coupon" onclick="set_coupon()"/>
								
                            </div>
							<div class="fontpara" id="coupon_result"></div>
          </div>
        </div>



                </div>          
              </div>
         
        </div>
        



    </div>
  </div>
 
</main>
<script>

jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#register-form" ).validate({
  rules: {
    email: {
      required: true,
      email: true
    }
    mobile: {
      required: true,
      mobile: true
    }
  }
});


// const isEmailValid =(email)=>{
//       const reg =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
//       return reg.test(email);
//     }

//   function validateEmail(emailVal) {
//   if(emailVal==""){        
//         showError(email,"Email Is Required")
//        validated = false;
//       }else if(!isEmailValid(emailVal)){        
//         showError(email,"Enter Valid Email")
//         validated = false;
//       }else{
//         showSuccess(email)
//         validated = true;
//       }
// }

// function validatePhoneNumber(input_str) {
//   var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;

//   return re.test(input_str);
// }
// function validateForm(event) {
//   var phone = document.getElementById('userMobile').value;
//   if (!validatePhoneNumber(phone)) {

// document.getElementById('mobileError').classList.remove('hidden');
//   } else {

// document.getElementById('mobileError').classList.add('hidden');
//     alert("validation success")
//   }
//   event.preventDefault();
// }

// document.getElementById('register-form').addEventListener('submit', validateForm);

//   var email_error = document.getElementById('email_error');

  // const email = document.getElementById('email');
  // email.addEventListener('keyup',(e)=>{
  //   console.log(e.target.value);

  //  validateEmail(e.target.value); 
 // })
  

function set_coupon(){
				var coupon_str=jQuery('#coupon_str').val();
				if(coupon_str!=''){
					jQuery('#coupon_result').html('');
					jQuery.ajax({
						url:'set_coupon.php',
						type:'post',
						data:'coupon_str='+coupon_str,
						success:function(result){
							var data=jQuery.parseJSON(result);
							if(data.is_error=='yes'){
								jQuery('#coupon_box').hide();
								jQuery('#coupon_result').html(data.dd);
								jQuery('#order_total_price').html(data.result);
							}
							if(data.is_error=='no'){
								jQuery('#coupon_box').show();
								jQuery('#coupon_price').html(data.dd);
								jQuery('#order_total_price').html(data.result);
							}
						}
					});
				}
			}
		</script>		
<?php 
if(isset($_SESSION['COUPON_ID'])){
	unset($_SESSION['COUPON_ID']);
	unset($_SESSION['COUPON_CODE']);
	unset($_SESSION['COUPON_VALUE']);
}
require('footer.php');

require('footer.php');
?>  
