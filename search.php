<?php 
require('top.php');

$search_str=mysqli_real_escape_string($con,$_GET['search_str']);
if($search_str!=''){
	$get_product=get_product($con,'','','',$search_str);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}										
?>

        
        <!-- Start Bradcaump area -->
		<nav class="hide-on-med-and-down">
    <div class="row">
      <div class="col s12 blue-grey lighten-4">
        <a href="index.php" class="breadcrumb ">Home </a>
        <a href="profile.php" class="breadcrumb">search </a>
        <a href="#!" class="breadcrumb"><?php echo $search_str ?></a>
      </div>
    </div> 
    <!--breadcrumb menus-->
  </nav>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <main class="main" style="min-height: 100vh;">
  <div class="row" id="ecommerce-products">
 
    <!-- <div class="col s12 m12 l3 pr-0 grey" style="height: 100vh;"> <h4>SIDEBAR</h4></div> -->
    <!--sidebar end here-->
    <!---here the product card row start------><?php if(count($get_product)>0){?>
          <div class="col s12 m12 l12 pr-0 grey lighten-2" style="min-height: 100vh;">
            <!-- Card with Modal Structure 1-->
      <?php
							// $get_product=get_product($con,'',$cat_id);
							foreach($get_product as $list){
			?>                
                      <div class="col s6 m4 l3">
                        <div class="card animate fadeLeft product-card" style="height: 380px;">
                          <!-- <div class="level"><a class="white-text"> <b>On Offer</b> </a></div> -->
                            <div class="card-content">
                              <p><?php echo $get_product['0']['categories']?></p>
                              <span class="card-title text-ellipsis"><a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></span>
                              <!-- <img src="img/cards/watch-2.png"  alt=""/> -->
                              <a href="product.php?id=<?php echo $list['id']?>" >
                                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" class="product-img" alt="product images">
                              </a>
                              <div class="display-flex flex-wrap justify-content-space-between">
                                <h6>MRP <del><?php echo $list['mrp']?></del>/-</h6>
                                <h6>PRICE <?php echo $list['price']?>/-</h6>
                              </div>
                              <div class="row ">
                              <div class="product-btn center">
                                <a class="btn-font  waves btn-small b-light white-text mt-2"
                                    href="product.php?id=<?php echo $list['id']?>">View</a>

                                    <a  class="btn-font btn-small b-light white-text mt-2" href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="material-icons">favorite_border</i></a>

                                     <a class=" btn-font btn-small b-light white-text mt-2" href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><input id="qty" type="hidden" value="1"><i class="material-icons">shopping_cart</i></a> 
                            </div>
                            </div>
                            </div>
                          </div>
                      </div>                                 
                      <?php } ?>
          </div>     
        
		  <?php } else { 
						echo "<div class='center'>Data not found</div>";
					} ?>                             
    </div>                                 

  </main>
        <!-- End Product Grid -->
        <!-- End Banner Area -->
		<input type="hidden" id="qty" value="1"/>
<?php require('footer.php')?>        