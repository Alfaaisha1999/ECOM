<?php require('top.php');
if (!isset($_GET['id']) && $_GET['id'] != '') {
  ?>
  <script>
    window.location.href = 'index.php';
  </script>
  <?php
}
$cat_id = mysqli_real_escape_string($con, $_GET['id']);

$sub_categories = '';
if (isset($_GET['sub_categories'])) {
  $sub_categories = mysqli_real_escape_string($con, $_GET['sub_categories']);
}

if ($cat_id > 0) {
  $get_product = get_product($con, '', $cat_id, '', '', '', '', '', $sub_categories);
} else {
  ?>
  <script>
    window.location.href = 'index.php';
  </script>
  <?php
}
?>

<!--Main content section start here-->
<main class="main" style="min-height: 100vh;">
  <div class="row" id="ecommerce-products">
   <div class="col s5 m4 l3 pr-0 " style="height: 100vh;">
    <ul class="collapsible">
        <li class="no-padding m-0">
        <li>
          <a href="categories.php?id=14&sub_categories=65" class="collapsible-header"><i
              class="material-icons left">send</i>i9 Ist Gen </a>
       </li>
        </li>
        <li class="no-padding">
        <li>
          <a href="categories.php?id=14&sub_categories=66" class="collapsible-header"><i
              class="material-icons left">send</i>i9 2nd Gen </a>
        </li>
        </li>       
          <li>
            <a href="categories.php?id=14&sub_categories=67" class="collapsible-header"><i
                class="material-icons left">send</i>i9 3th Gen </a>
          </li>
          </li>
          <li class="no-padding">
          <li>
            <a href="categories.php?id=14&sub_categories=68" class="collapsible-header"><i
                class="material-icons left">send</i>i9 4th Gen </a>
          </li>
          </li>
          <li class="no-padding">
          <li>
            <a href="categories.php?id=14&sub_categories=69" class="collapsible-header"><i
                class="material-icons left">send</i>i9 5st Gen </a>
          </li>
          </li>
          <li class="no-padding">
          <li>
            <a href="categories.php?id=14&sub_categories=70" class="collapsible-header"><i
                class="material-icons left">send</i>i9 6th Gen </a>
          </li>
          </li>
          <li class="no-padding">
          <li>
            <a href="categories.php?id=14&sub_categories=71" class="collapsible-header"><i
               class="material-icons left">send</i>i9 7th Gen </a>
          </li>
          </li>
          <li class="no-padding">
          <li>
            <a href="categories.php?id=14&sub_categories=72" class="collapsible-header"><i
                class="material-icons left">send</i>i9 8th Gen </a>
          </li>
          </li>
          <li class="no-padding">

          <li>
            <a href="categories.php?id=14&sub_categories=73" class="collapsible-header"><i
                class="material-icons left">send</i>i9 9th Gen</a>
          </li>
          </li>
          <li class="no-padding">
          <li>
            <a href="categories.php?id=14&sub_categories=74" class="collapsible-header"><i
                class="material-icons left">send</i>i9 10th Gen </a>
          </li>
          </li>
          <li class="no-padding">
          <li>
            <a href="categories.php?id=14&sub_categories=75" class="collapsible-header"><i
                class="material-icons left">send</i>i9 11th Gen </a>
          </li>
          </li>
          <li class="no-padding">
          <li>
            <a href="categories.php?id=14&sub_categories=76" class="collapsible-header"><i
                class="material-icons left">send</i>i9 12th Gen </a>
          </li>
          </li>
        </ul>
    </div>
    <!--sidebar end here-->
    <!---here the product card row start------>
    <div class="col s7 m8 l9 pr-0 grey lighten-2" style="min-height: 100vh;">
      <!-- Card with Modal Structure 1-->
      <?php
							foreach($get_product as $list){
                $listprice=$list['price']*18/100+$list['price'];
                $listmrp=$list['mrp']*18/100+$list['mrp'];
			?>                
                        <div class="card animate fadeLeft product-card">
                          <!-- <div class="level"><a class="white-text"> <b>On Offer</b> </a></div> -->
                            <div class="card-content">
                              <p ><a class="black-text" href="categories.php?id=<?php echo $list['categories_id']?>"><?php echo $list['categories']?></a></p>
                              <span><a  class="card-title text-ellipsis black-text" href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></span>
                              <!-- <img src="img/cards/watch-2.png"  alt=""/> -->
                              <div>
                              <a href="product.php?id=<?php echo $list['id']?>" >
                                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" class="product-img" alt="product images" height="200" width="200">
                              </a>
                              </div>
                              <div class="display-flex flex-wrap justify-content-space-between">
                                <h6 class="prize">MRP <del><?php echo $listmrp ?></del>/-</h6>
                                <h6 class="prize">PRICE <?php echo $listprice?>/-</h6>
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
                                                     
                      <?php } ?>
    </div>


  </div>

</main>
<!--footer-->
<?php require('footer.php') ?>


</body>

</html>