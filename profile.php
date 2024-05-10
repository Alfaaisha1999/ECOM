<?php require('top.php');
  
  $userid=$_SESSION['USER_ID'];  
  $sql="select * from users where id='$userid'";
  $res=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($res);
  $uid=$row['id']; $name=$row['name'];$mobile=$row['mobile'];$uemail=$row['email'];$pic=$row['image'];



  $uid=$_SESSION['USER_ID'];
    if(isset($_GET['wishlist_id'])){
    $wid = $_GET['wishlist_id'];
  
    mysqli_query($con, "delete from wishlist where id='$wid' and user_id='$uid'");
    }

$res=mysqli_query($con,"select product.name,product.image,product.price,product.mrp,wishlist.product_id,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'");
?>
<!--Main content section start here-->
<nav class="bottom-navbar">
<a  class="modal-trigger" href="#modal2"><img src="image/lap.png" alt=""></a>
            <!-- <a href="categories.php?id=6"> <img src="image/moni.png" alt=""></a> -->
            <a class="modal-trigger" href="#modal1"> <img src="image/moni.png" alt=""></a>
            <!-- <a href="categories.php?id=8"> <img src="image/sd.png" alt=""></a> -->
            <a class="modal-trigger" href="#modal1"> <img src="image/sd.png" alt=""></a>
            <!-- <a href="categories.php?id=7"> <img src="image/cpuu.png" alt=""></a> -->
            <a class="modal-trigger" href="#modal1"> <img src="image/cpuu.png" alt=""></a>
            <!-- <a href="categories.php?id=9"> <img src="image/ras.png" alt=""></a> -->
            <a class="modal-trigger" href="#modal1"> <img src="image/ras.png" alt=""></a>
</nav>
<!--Main content section start here-->   
<div id="modal2" class="modal">
            <div class="modal-content pt-2">
              <div class="row" id="product-one">
                <div class="col s12">
                  <a class="modal-close right"><i class="material-icons">close</i></a>
                </div>
              <!-----Signup form start----->
              <div class="card-action black-text center">
                <h4>Choose</h4>
              </div>
              <div class="card-content center">
                <div id="myalert"></div>
                  
                    <p class="fontpara">Hello friend! Choose what you want.</p>
                    <div class="product-btn">
                    <div class=" mt-2  waves-effect waves-light b-light black-text btn btn-block modal-trigger z-depth-4">
            <a class="black-text" href="categories.php?id=5">Old Laptop</a>
            </div>
                    <div class=" mt-2 waves-effect waves-light b-light black-text btn btn-block modal-trigger z-depth-4">
            <a class="black-text" href="categories.php?id=5">New Laptop</a>
            </div>
            </div>
              </div>     
              </div>
            </div>
          </div>    
<main class="main" style="min-height: 100vh;">
  <nav class="hide-on-med-and-down">
    <div class="row">
      <div class="col s12 blue-grey lighten-4">
        <a href="index.php" class="breadcrumb ">Home</a>
        <a href="profile.php" class="breadcrumb">User</a>
        <a href="#!" class="breadcrumb">Account</a>
      </div>
    </div>
    <!--breadcrumb menus-->
  </nav>
  <div class="row" style="width: 100%;">
    <div class="col l3 hide-on-med-and-down">
    
      <div class="card tabs-vertical">
        <ul class="tabs">
          <li class="tab"><a href="#account"><i class="material-icons left">account_box</i><span
                class="center">Account</span></a></li>
          <li class="tab"><a href="#orders"><i class="material-icons left">receipt</i>My Orders</a></li>
          <li class="tab"><a href="#myCart"><i class="material-icons left">shopping_cart</i>My Cart</a></li>
          <li class="tab"><a href="#Security"><i class="material-icons left">security</i>Security</a></li>
        </ul>
      </div>
    </div>
    <div class="col l9 m12 s12 no-pad-sm">
      <div class="card">
        <div class="card-tabs hide-on-large-only">
          <ul class="tabs tabs-fixed-width">
            <li class="tab"><a href="#account" class="active"><i class="material-icons">account_box</i></a>
         </li>
           
            <li class="tab"><a href="#orders"><i class="material-icons">receipt</i></a></li>
            <!-- <li class="tab"><a href="#Wishlist"><i class="material-icons">favorite_border</i></a></li> -->
            <li class="tab"><a href="#myCart"><i class="material-icons">shopping_cart</i></a></li>
            <li class="tab"><a href="#Security"><i class="material-icons">security</i></a></li>
          </ul>
        </div>
        <div id="account" class="tab-page">
          <div class="card-panel grey lighten-5 z-depth-1">
            <!--profile card start -->
            <div class="row valign-wrapper mb-0">
              <div class="col s2">
                <img src="media/download (1).png" alt=""
                  class="circle responsive-img">
                <!-- notice the "circle" class -->
              </div>
              <div class="col s10">
                <span class="black-text">
                  <form id="login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%" value="<?php echo $name?>">
										</div>
										<span class="field_error" id="name_error"></span>
									</div>
									
									<div class="contact-btn">
										<button type="button" class="waves-effect waves btn-small b-light white-text mt-2" onclick="update_profile()" id="btn_submit">Update</button>
										
									</div>
								</form>
                  <form id="login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="email" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" placeholder="Your email*" style="width:100%" value="<?php echo $uemail?>">
										</div>
										<span class="field_error" id="email_error"></span>
									</div>
									
									<div class="contact-btn">
										<button type="button" class="waves-effect waves btn-small b-light white-text mt-2" onclick="update_email()" id="btn_submit">Update</button>
										
									</div>
								</form>
                 <span class="fontpara"><b>Mob:&nbsp;&nbsp;&nbsp; </b> <?php  echo   $mobile?> </span>
                   
                  
                </span>
              </div>
            </div>
            <div class="divider"></div>
            <?php
            $uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status  order by `order`.id desc");
											while($row=mysqli_fetch_assoc($res)){
											?>
            <div class="row mb-0">
              <div class="col s12">
                <p class="black-text fontpara"><i class="material-icons left">place</i><?php echo $row['address']?>
												<?php echo $row['city']?>
												<?php echo $row['pincode']?>
                </p>
              </div>
            </div>
            <?php } ?>
            <div class="divider"></div>
          
          </div>
          <!--account card ends -->
        
        <!--profile card start -->
        
          <!--profile card ends -->
          <div class="card" style="height: 100px;"></div>
        </div>
       
        <div id="orders" class="tab-page">
          <div class="card-panel grey lighten-5 z-depth-1">
            <!--orders card start -->
            <h6>My Orders </h6>
            <table>
            <thead>
                                            <tr class="fontpara">
                                                <th class="product-thumbnail">Order ID</th>
                                                <th class="fontpara"><span class="nobr">Order Date</span></th>
                                                <th class="product-price"><span class="nobr"> Address </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
												<!-- <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th> -->
												<th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
                                            </tr>
                                        </thead>
                                        <tbody class="fontpara">
                                        <?php
											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status  order by `order`.id desc");
											while($row=mysqli_fetch_assoc($res)){
											?>
                                            <tr>
												<td class="product-add-to-cart"><a href="my_order_details.php?id=<?php echo $row['id']?>"> <?php //echo $row['id']?>
                                                <div class="mt-2 blue-text ">
                                           click here for product details
                                        </div></a>
                                                <!-- <a href="order_pdf.php?id=<?php echo $row['id']?>"> PDF</a> -->
                                            </td>
                                                <td class="fontpara"><?php echo $row['added_on']?></td>
                                                <td class="fontpara">
												<?php echo $row['address']?><br/>
												<?php echo $row['city']?><br/>
												<?php echo $row['pincode']?>
												</td>
												<td class="fontpara"><?php echo $row['payment_type']?></td>
												<!-- <td class="fontpara"><?php echo $row['payment_status']?></td> -->
												<td class="fontpara"><?php echo $row['order_status_str']?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
            </table>
          </div>
          <!--order card ends -->
        </div>
        <div id="Wishlist" class="tab-page">
          <div class="card-panel grey lighten-5 z-depth-1">
            <!--wishlist card start -->
           
          </div>
          <!--wishlist card ends -->
        </div>
        <div id="myCart" class="tab-page">
          <div class="card-panel grey lighten-5 z-depth-1">
            <!--mycart card start -->
            <h6>My Cart</h6>

            
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                            <table>
                            <thead>
                                        <tr  class="fontpara">
                                            <th class="product-thumbnail">products</th>
                                           
                                            <th class="product-price">Price</th>
                                           
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $key=>$val){
											$productArr=get_product($con,'','',$key);
                                            $pid = $productArr[0]['id'];
											$pname=$productArr[0]['name'];
											$mrp=$productArr[0]['mrp'];
											$price=$productArr[0]['price'];
											$image=$productArr[0]['image'];
											$qty=$val['qty'];
                                            $rate=$price * 18 / 100 + $price;
                                                $total = $qty * $rate;

                                                $mrp = $mrp + ($mrp*18/100);
                                            
											?>
											<tr>
												
												<td class="product-name">
													<ul  class="pro__prize">
														<li class="product-thumbnail"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" height="100" width="100"/></a></li>
														<li class="fontpara5"><a href="product.php?id=<?php echo $pid ?>"><?php echo $pname?></a></li>
													</ul>
												</td>
												
												<td class="product-quantity"><span class="amount fontpara"><?php echo $rate?>/-</span><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" />
												<br/><a  class="fontpara" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
												</td>
												<td class="fontpara"><?php echo  $total?></td>
												<td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="material-icons left">delete</i></a></td>
											</tr>
											<?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col l6 s12 m6">
                                   
                                        <div class="mt-2 left waves-effect waves-light b-light white-text btn btn-block modal-trigger z-depth-4">
                                            <a class="white-text" href="index.php">Continue Shopping</a>
                                        </div>
                                        <div class="mt-2 right waves-effect waves-light b-light white-text btn btn-block modal-trigger z-depth-4">
                                            <a class="white-text" href="checkout.php">checkout</a>
                                        </div>
                                   
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
                     
          </div>
          <!--cart card ends -->
        </div>
        <div id="Security" class="tab-page">
          <div class="card-panel grey lighten-5 z-depth-1">
            <!--security card start -->
            <h6>Security</h6>
              
                    <div class="card-panel">
                      <form class="paaswordvalidate">
                        <div class="row">
                          <div class="col s12">
                            <div class="input-field">
                            <input type="password" name="current_password" id="current_password" style="width:100%">
                              <label for="oldpswd">Old Password</label>
                              <small class="field_error" id="current_password_error"></small>
                            </div>
                          </div>
                          <div class="col s12">
                            <div class="input-field">
                            <input type="password" name="new_password" id="new_password" style="width:100%">
                              <label for="newpswd">New Password</label>
                              <small class="field_error" id="new_password_error"></small>
                            </div>
                          </div>
                          <div class="col s12">
                            <div class="input-field">
                            <input type="password" name="confirm_new_password" id="confirm_new_password" style="width:100%">
                              <label for="repswd">Confirm new Password</label>
                              <small class="field_error" id="confirm_new_password_error"></small>
                            </div>
                          </div>
                          <div class="col s12 display-flex justify-content-end form-action">
                            <button type="submit" class="btn indigo waves-effect waves-light mr-1"  onclick="update_password()" id="btn_update_password">Save changes</button>
                            <button type="reset" class="btn btn-light-pink waves-effect waves-light">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
               
          </div>
          <!--security card ends -->
        </div>
        <div id="Setting" class="tab-page">
          <!--setting card start -->
         
          <!--setting card ends -->
        </div>
      </div>
    </div>
  </div>
</main>
<?php require('footer.php') ?>


<script>
  function openPage(evt, pageName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tab-page");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("collection-item");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(pageName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();



  function update_profile(){
			jQuery('.field_error').html('');
			var name=jQuery('#name').val();
			if(name==''){
				jQuery('#name_error').html('Please enter your name');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'update_profile.php',
					type:'post',
					data:'name='+name,
					success:function(result){
						jQuery('#name_error').html(result);
						jQuery('#btn_submit').html('Update');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
  function update_email(){
			jQuery('.field_error').html('');
			var email=jQuery('#email').val();
			if(email==''){
				jQuery('#email_error').html('Please enter your email');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'email_update_profile.php',
					type:'post',
					data:'email='+email,
					success:function(result){
						jQuery('#email_error').html(result);
						jQuery('#btn_submit').html('Update');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
    
    function update_password(){
			jQuery('.field_error').html('');
			var current_password=jQuery('#current_password').val();
			var new_password=jQuery('#new_password').val();
			var confirm_new_password=jQuery('#confirm_new_password').val();
			var is_error='';
			if(current_password==''){
				jQuery('#current_password_error').html('Please enter password');
				is_error='yes';
			}if(new_password==''){
				jQuery('#new_password_error').html('Please enter password');
				is_error='yes';
			}if(confirm_new_password==''){
				jQuery('#confirm_new_password_error').html('Please enter password');
				is_error='yes';
			}
			
			if(new_password!='' && confirm_new_password!='' && new_password!=confirm_new_password){
				jQuery('#confirm_new_password_error').html('Please enter same password');
				is_error='yes';
			}
			
			if(is_error==''){
				jQuery('#btn_update_password').html('Please wait...');
				jQuery('#btn_update_password').attr('disabled',true);
				jQuery.ajax({
					url:'update_password.php',
					type:'post',
					data:'current_password='+current_password+'&new_password='+new_password,
					success:function(result){
						jQuery('#current_password_error').html(result);
						jQuery('#btn_update_password').html('Update');
						jQuery('#btn_update_password').attr('disabled',false);
						jQuery('#frmPassword')[0].reset();
					}
				})
			}
			
		}
</script>


</body>

</html>