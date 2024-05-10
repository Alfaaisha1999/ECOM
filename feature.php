
<?php require('top.php');

?>
 <div class="carousel carousel-slider" id="SliderBox">
          <a class="carousel-item" href="#one!"><img src="media/1.png" height="100%"></a>
          <a class="carousel-item" href="#tow!"><img src="media/2.png" height="100%"></a>
          <a class="carousel-item" href="#tree!"><img src="media/3.png" height="100%"></a>
          <a class="carousel-item" href="#four!"><img src="media/4.png" height="100%"></a>
          <a class="carousel-item" href="#five!"><img src="media/5.png" height="100%"></a>
          <!-- <a class="carousel-item" href="#six!"><img src="media/slide/banner-6.png" height="100%"></a> -->
          <div class="carousel-fixed-item center">  
              <!--a class="waves-effect waves-light btn" href="about.php">MORE INFO<i class="material-icons right">send</i></a-->
            </div>
            <!--a class="carousel-item" href="#two!"><img src="media/slide/laptop-1.avif" height="100%"></a>
            <a class="carousel-item" href="#tree!"><img src="media/slide/laptop-2.avif" height="100%"></a-->
        </div>
<!--Main content section start here-->
<main class="main" style="min-height: 100vh;">
<div class="col l12">
                      
                      <h2 class=" center">BEST OFFERS</h2>
                      
                    </div>
                    <div class="row" id="ecommerce-products" style="min-height: 100vh;">
               
  

        
         
           
            <?php
							$get_product=get_product($con,4,'','','','','','right');
							foreach($get_product as $list){
							?>
                <div class="col s6 m4 l3 center">
                        <div class="card product-card product-best-card animate fadeLeft">
                          <div class="level"><a class="white-text"> <b>deals</b> </a></div>
                            <div class="card-content">
                              <p><a class="black-text" href="categories.php?id=<?php echo $list['categories_id']?>"><?php echo $list['categories']?></a></p>
                              <span class="card-title text-ellipsis"><a class="black-text" href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></span>
                              <a href="product.php?id=<?php echo $list['id']?>">
                                            <img  class="product-img" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images" height="200" width="200">
                                        </a>
                              
                             <div class="display-flex flex-wrap justify-content-center">
                             <div class="display-flex flex-wrap justify-content-space-between">
                                <h6>MRP <del class="red-text"><?php echo $list['mrp']?></del>/-</h6>
                                <h6  class="green-text">PRICE <?php echo $list['price']?>/-</h6>
                              </div>
                              <div class="row ">
                              <div class="product-btn product center">
                                <a class="btn-font  waves btn-small b-light white-text mt-2"
                                    href="product.php?id=<?php echo $list['id']?>">View</a>

                                    <a  class="btn-font btn-small b-light white-text " href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="material-icons">favorite_border</i></a>

                                     <a class=" btn-font btn-small b-light white-text " href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><input id="qty" type="hidden" value="1"><i class="material-icons">shopping_cart</i></a> 
                            </div>
                             </div>
                            </div>
                        </div>
    
    
                      </div>
        </div>
        <?php } ?>
 
<div class="row">
<div class="col l12 s12 m12">
                       
                       <h2 class=" center">All Brands</h2>
                  
               </div>
               </div>
               <div class="row">
    <div class="col s4 m4 l2">
      <div class="card-panel-brands black">
       <div class="card-image waves-effect waves-block waves-light">
      <img class="activator brands" src="media/cards/apple.png">
    </div>
     
     
      </div>
    </div>
    <div class="col s4 m4 l2">
      <div class="card-panel-brands black">
      <div class="card-image waves-effect waves-block waves-light">
      <img class="activator brands" src="media/cards/hp.png">
    </div>
      </div>
    </div>
    <div class="col s4 m4 l2">
      <div class="card-panel-brands black">
      <div class="card-image waves-effect waves-block waves-light">
      <img class="activator brands" src="media/cards/lenovo.png">
    </div>
      </div>
    </div>
    <div class="col s4 m4 l2">
      <div class="card-panel-brands  black">
      <div class="card-image waves-effect waves-block waves-light">
      <img class="activator brands" src="media/cards/dell.png">
    </div>
      </div>
    </div>
    <div class="col s4 m4 l2">
      <div class="card-panel-brands black">
      <div class="card-image waves-effect waves-block waves-light">
      <img class="activator brands" src="media/cards/acer.png">
    </div>
      </div>
    </div>
    <div class="col s4 m4 l2">
      <div class="card-panel-brands black">
      <div class="card-image waves-effect waves-block waves-light">
      <img class=" activator brands" src="media/cards/acer.png">
    </div>
      </div>
    </div>
    
    

  </div>
      
  
  </main>
<!--footer-->
<?php require('footer.php') ?>
 