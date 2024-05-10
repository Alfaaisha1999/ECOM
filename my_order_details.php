<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id=get_safe_value($con,$_GET['id']);
?>


<main class="main" style="min-height: 100vh;">
  <div class="row" id="ecommerce-products">
   
    <!---here the product card row start------>
          <div class="col s12 m12 l12 pr-0 grey lighten-2" style="min-height: 100vh;">
            <!-- Card with Modal Structure 1-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                <thead>
                                            <tr class="fontpara">
                                                <th class="fontpara">Product Name</th>
												<th class="fontpara">Product Image</th>
                                                <th class="fontpara">Qty</th>
                                                <th class="fontpara">Price</th>
                                                <th class="fontpara">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
											$total_price=0;
											while($row=mysqli_fetch_assoc($res)){
                                                
                                                $total = ($row['qty']*$row['price']);
                                                $tex = $total * 18 / 100;
                                                $gst = $total + $tex;
                                             $total_price=$total_price+ $gst ;

											
											?>
                                            <tr class="fontpara">
												<td class="fontpara5"><?php echo $row['name']?></td>
                                                <td class="fontpara"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" height="100" width="100"></td>
												<td class="fontpara"><?php echo $row['qty']?></td>
												<td class="fontpara"><?php echo $gst?></td>
												<td class="fontpara"><?php echo $gst?></td>
                                                
                                            </tr>
                                            <?php } ?>
											<tr>
												<td colspan="3"></td>
												<td class="fontpara">Total Price</td>
												<td class="fontpara"><b> <?php echo $total_price?></b></td>
                                                
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col l6 s12 m6">
                                   
                                        <div class="mt-2 center waves-effect waves-light b-light white-text btn btn-block modal-trigger z-depth-4">
                                            <a class="white-text" href="index.php">Continue Shopping</a>
                                        </div>
                                       
                                        
                                   
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>        
                            
                     
            
          </div>                                 
    </div>                                 

  </main>

<?php require("footer.php");?>