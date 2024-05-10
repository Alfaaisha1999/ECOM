<?php require('top.php') ?>

<!--Main content section start here-->
    
<main class="main" style="min-height: 100vh;">
    <div class="row" id="ecommerce-products">
        <div class="container">
            <div class="row">
                <div class="col s12  m12 l12">
                    <form action="#">
                        <div class="table-content table-responsive" style="overflow: scroll;">
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

                                <div
                                    class="mt-2 left waves-effect waves-light b-light white-text btn btn-block modal-trigger z-depth-4">
                                    <a class="white-text" href="index.php">Continue Shopping</a>
                                </div>
                                <div
                                    class="mt-2 right waves-effect waves-light b-light white-text btn btn-block modal-trigger z-depth-4">
                                    <a class="white-text" href="checkout.php">checkout</a>
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
<script>




</script>
<!--footer-->
<?php require('footer.php') ?>