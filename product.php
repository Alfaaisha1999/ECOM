<?php
ob_start();
require('top.php');
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
	
	$resMultipleImages=mysqli_query($con,"select product_images from product_images where product_id='$product_id'");
	$multipleImages=[];
	if(mysqli_num_rows($resMultipleImages)>0){
		while($rowMultipleImages=mysqli_fetch_assoc($resMultipleImages)){
			$multipleImages[]=$rowMultipleImages['product_images'];
		}
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$gst = $get_product['0']['price'] * 18 / 100;
$price = $gst + $get_product['0']['price'];
$mrpgst = $get_product['0']['mrp'] * 18 / 100;
$mrpprice = $mrpgst + $get_product['0']['mrp'];
?>

<main class="main" style="min-height: 100vh;">
  <!---here the product card row start------>
  <div class="row" id="ecommerce-products">

    <!---large card product---->
    <div class="col s12">
      <div class="card animate fadeUp">
     
        <div class="card-content">
          <div class="row" id="product-four">

          <div class="col m6 l6 s12">
          <div>
              <!-- Start Product Big Images -->
              <div>
                  <div class="portfolio-full-image tab-content">
                      <div class="col l12 m12 s12 imageZoom" id="img-tab-1">
                          <img data-origin="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>"   class="responsive-img materialboxed" height="500" width="500">
                      </div>
  
										<?php if(isset($multipleImages[0])){?>
										<div class="multiple_images">
											<?php
											foreach($multipleImages as $list){
			echo "<img class='multiple_images_img' src='".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list."' onclick=showMultipleImage('".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list."')>";
											}
											?>
											
										</div>
										<?php } ?>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
              </div>
            </div>
           
           
            <!-- product content -->
            <div class="col m6 s12">
              <p><a href="#">
                  <?php echo $get_product['0']['categories'] ?>
              </p>
              <h5 class="black-text"><?php echo $get_product['0']['name'] ?></h5>
              <!-- <span class="new badge blue lighten-1 left ml-0 mr-2" data-badge-caption="">4.2 Star</span> -->
              <div class="row">
                <div class="col m6 s6  fontpara">
                  <p>Stock: <span class="green-text">In Stock</span></p>
                </div>
                <div class="col m6 s6">
                  <!-- <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')"> <span class="vertical-align-top">
                <i class="material-icons left">favorite_border</i>Wishlist</span></a> -->
                </div>
              </div>
              <hr class="mb-5">

              <h6 class="red-text  fontpara">Price <?php echo $price ?>/-
                <span class="grey-text lighten-2 ml-3  fontpara">MRP <del>
                    <?php echo $mrpprice?>
                  </del>/-</span>
              </h6>



              <div class="col s6 left">
              <p><span>Qty:</span> 
									<input id="qty" type="number" value="1">
										</p>
              </div>


              <div class="row">
                <div class="col s12 ">
                  <!-- product short description -->
                  <ul class=" black-text list-bullet">
                    <p class="black-text left fontpara">
                      <?php echo $get_product['0']['short_desc'] ?>
                    </p>
                </div>
              </div>
            
              </ul>
              <div class="">
                <!-- <a href="#" class="btn-small blue lighten-1 ">button</a> -->
               <button id="product" class="waves-effect waves btn-small b-light white-text z-depth-4 mt-2 mr-2"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add')" class="white-text">ADD TO CART</a></button> 
                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add','yes')"
                  class="waves-effect waves btn-small b-light white-text z-depth-4 mt-2 ">BUY NOW</a>

              </div>
              <!-- product btn end -->
            </div>
          </div>
        </div>
        <div class="container">
          <h6>Product Description</h6>
          <p class="fontpara">
            <?php echo $get_product['0']['description'] ?>
          </p>
        </div>
      </div>
    </div>


  </div>


          
 
  
  <?php require('component.php') ?>
</main>

  <script>


let btnSend = document.querySelector('#product');
      btnSend.addEventListener('click', () => {
	  btnSend.innerText = 'Adding...';
  
	  setTimeout(() => {
  
		btnSend.innerText = 'product Added';
	  }, 1000);
	});


			function showMultipleImage(im){


				jQuery('#img-tab-1').html("<img src='"+im+"' data-origin='"+im+"' height='500' width='500'/>");
        jQuery('.imageZoom').imgZoom();
			}
			</script>

<!--footer-->
<?php require('footer.php') ?>