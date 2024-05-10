<?php require("top.php");


if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
    $res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id'");
}?>
 
<main class="main" style="min-height: 100vh;">
  <div class="row" id="ecommerce-products">
 
    <!---here the product card row start------>
          <div class="col s12 m12 l12 pr-0 grey lighten-2" style="min-height: 100vh;">
            <!-- Card with Modal Structure 1-->
          
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
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
                            <div class="row">
                                <div class="col l6 s12 m6">
                                   
                                        <div class="mt-2 center waves-effect waves-light black white-text btn btn-block ">
                                            <a class="white-text" href="index.php">Continue Shopping</a>
                                        </div>
                                      
                                   
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
         </div>                                 
    </div>  
    <?php require('component.php') ?>                               
  </main>

<?php require("footer.php");?>