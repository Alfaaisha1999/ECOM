<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$uid=$_SESSION['USER_ID'];
    if(isset($_GET['wishlist_id'])){
    $wid = $_GET['wishlist_id'];
  
    mysqli_query($con, "delete from wishlist where id='$wid' and user_id='$uid'");
    }

$res=mysqli_query($con,"select product.name,product.image,product.price,product.mrp,wishlist.product_id,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'");
?>

<!--Main content section start here-->
<main class="main" style="min-height: 100vh;">
  <div class="row" id="ecommerce-products">
   <div class="container">
    <table>
      <thead>
        <tr  class="fontpara">
          <th class="fontpara">products</th>
          <th class="fontpara">name of products</th>
          <th class="fontpara">Remove</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($res)) {
          $rowprice=$row['price']*18/100+$row['price'];
          $rowmrp=$row['mrp']*18/100+$row['mrp'];
          ?>
          <tr>
            <td >
              <ul><li><a  href="product.php?id=<?php echo $row['product_id']?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" height="150" width="150"/></a></li>

            <li  class="fontpara5"><a  class="black-text" href="product.php?id=<?php echo $row['product_id']?>">
                <?php echo $row['name'] ?>..
              </a></li></ul>
            </td>
            <td class="fontpara">
              <ul class="pro__prize">
              
                  <del class="grey-text"><?php echo $rowmrp ?></del>/-
              
                <?php echo $rowprice ?>/-
                <!-- <a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add','right')"
                  class="waves-effect waves btn-small b-light white-text z-depth-4 mt-2 ">BUY NOW</a> -->
              </ul>
            </td>
            <td class="product-remove"><a href="wishlist.php?wishlist_id=<?php echo $row['id'] ?>"><i
                  class="material-icons black-text">delete</i></a></td>
          </tr>
          <?php } ?>
      </tbody>
    </table>
    </div>

  </div>
  <?php require('component.php') ?>
</main>
<!--footer-->
<?php require('footer.php') ?>


</body>

</html>