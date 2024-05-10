
                    <div class="col l12">
                      
                      <h2 class=" center">BEST OFFERS</h2>
                      
                    </div>
                    <div class="row" id="ecommerce-products">
               
    <!---here the product card row start------>

        
         
            <!-- Card with Modal Structure 1-->
            <?php
							$get_product=get_product($con,4,'','','','','yes');
							foreach($get_product as $list){
                $listprice=$list['price']*18/100+$list['price'];
                $listmrp=$list['mrp']*18/100+$list['mrp'];
							?>
                <div class="col s6 m4 l3 center">
                        <div class="card product-card product-best-card animate fadeLeft">
                          <div class="level"><a class="white-text"> <b>On Offer</b> </a></div>
                            <div class="card-content">
                              <p><a class="black-text" href="categories.php?id=<?php echo $list['categories_id']?>"><?php echo $list['categories']?></a></p>
                              <span class="card-title text-ellipsis"><a class="black-text" href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></span>
                              <a href="product.php?id=<?php echo $list['id']?>">
                                            <img  class="product-img" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images" height="200" width="200">
                                        </a>
                              
                             <div class="display-flex flex-wrap justify-content-center">
                             <div class="display-flex flex-wrap justify-content-space-between">
                                <h6>MRP <del class="red-text"><?php echo   $listmrp?></del>/-</h6>
                                <h6  class="green-text">PRICE <?php echo $listprice?>/-</h6>
                              </div>
                              <div class="row ">
                              <div class="product-btn product center">
                                <a class=" waves btn-small b-light white-text mt-2"
                                    href="product.php?id=<?php echo $list['id']?>">View</a>

                                    <a  class=" btn-small b-light white-text " href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="material-icons">favorite_border</i></a>

                                     <a class=" btn-small b-light white-text " href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><input id="qty" type="hidden" value="1"><i class="material-icons">shopping_cart</i></a> 
                            </div>
                             </div>
                            </div>
                        </div><!--card class-->
    
    
                      </div>
        </div>
        <?php } ?>
        
        
    
     

