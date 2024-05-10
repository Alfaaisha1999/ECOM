
<?php require('top.php');

?>

<!-- header section starts  -->

<div class="topnavbar">
<div class="hide">
    <div >
        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <div id="login-btn" class="fas fa-user"></div>
        </div>

    </div>
    </div>

    <div class="header-2">
        <div class="navbar">
            <a  class="modal-trigger" href="#modal2"><img src="image/lap.png" alt=""></a>
          
            <a class="modal-trigger" href="#modal1"> <img src="image/moni.png" alt=""></a>
            <!-- <a href="categories.php?id=8"> <img src="image/sd.png" alt=""></a> -->
            <a class="modal-trigger" href="#modal1"> <img src="image/sd.png" alt=""></a>
            <a class="modal-trigger" href="#modal1"> <img src="image/cpuu.png" alt=""></a>
            <!-- <a href="categories.php?id=9"> <img src="image/ras.png" alt=""></a> -->
            <a class="modal-trigger" href="#modal1"> <img src="image/ras.png" alt=""></a>
   
</div>
    </div>

</div>

<!-- header section ends -->

<!-- bottom navbar  -->

<nav class="bottom-navbar">
            <!-- <a href="categories.php?id=5"><img src="image/lap.png" alt=""></a> -->
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

<!-- login form  -->
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
                    <div class="mt-2 mr-2 waves-effect waves-light b-light white-text btn btn-block modal-trigger z-depth-4">
            <a class="btnwhite" href="categories.php?id=5">Old Laptop</a>
            </div>
                    <div class=" mt-2 waves-effect waves-light b-light white-text btn btn-block modal-trigger z-depth-4">
            <a class="btnwhite" href="categories.php?id=5">New Laptop</a>
            </div>
            </div>
              </div>     
              </div>
            </div>
          </div>

<div class="hide">

    <div id="close-login-btn" class="fas fa-times"></div>


</div>
<div class="carousel carousel-slider" id="SliderBox">
          <a class="carousel-item" href="#one!"><img src="media/1.png" height="100%"></a>
          <a class="carousel-item" href="#tow!"><img src="media/2.png" height="100%"></a>
          <a class="carousel-item" href="#tree!"><img src="media/3.png" height="100%"></a>
          <a class="carousel-item" href="#four!"><img src="media/4.png" height="100%"></a>
          <a class="carousel-item" href="#five!"><img src="media/5.png" height="100%"></a>
        </div> 
<!-- home section starts  -->
<div id="modal1" class="modal">
            <div class="modal-content pt-2">
              <div class="row" id="product-one">
                <div class="col s12">
                  <a class="modal-close right"><i class="material-icons">close</i></a>
                </div>
              <!-----Signup form start----->
              <div class="card-action black-text center">
                <h2>Coming Soon</h2>
              </div>
              <div class="card-content center">
                <div id="myalert"></div>
                    <h4>This Service is Under Construction</h4>
                    <p class="fontpara mt-2">Hello friends! We are currently Work our new this service.</p>
                    <div class=" mt-2 waves-effect waves-light b-light white-text btn btn-block modal-trigger z-depth-4">
            <a class="white-text" href="index.php">Continue Shopping</a>
            </div>
              </div>     
              </div>
            </div>
          </div>
<section class="home indexsection" id="home">

    <div class="row">

        <div class="content">
            <h3>Heavy discount On every Product</h3>
            <p></p>
            <a href="#featured" class="btn">shop now</a>
        </div>

        <div class="swiper laptops-slider">
            <div class="swiper-wrapper">
        <?php
							$get_product=get_product($con,"");
							foreach($get_product as $list){
							?> 
                <a class="swiper-slide" href="product.php?id=<?php echo $list['id']?>" >
                                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" class="product-img" alt="product images" height="200" width="200">
                              </a>
                              <?php } ?>
            </div>
            <img src="image/stand.png" class="stand" alt="">
        </div>

    </div>

</section>

<!-- home section ense  -->

<!-- icons section starts  -->

<section class="icons-container indexsection">

    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <div class="content">
            <h3>free shipping</h3>
            <p>order over 100lc</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
            <h3>secure payment</h3>
            <p>100 secure payment</p>
        </div>
    </div>
    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>24/7 support</h3>
            <p>call us anytime</p>
        </div>
    </div>

</section>

<!-- icons section ends -->

<!-- featured section starts  -->

<section class="featured indexsection" id="featured">

    <h1 class="heading"> <span>New Arrivals</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">
        <?php
							$get_product=get_product($con,"8");
							foreach($get_product as $list){
                $listprice=$list['price']*18/100+$list['price'];
                $listmrp=$list['mrp']*18/100+$list['mrp'];
							?>   
            <div class="swiper-slide box">
                <div class="icons">
                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')" class="fas fa-shopping-cart"><input id="qty" type="hidden" value="1"></a>
                    <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')" class="fas fa-heart"></a>
                    <a href="product.php?id=<?php echo $list['id']?>" class="fas fa-eye"></a>
                </div>
                <div class="image">
                <a href="product.php?id=<?php echo $list['id']?>" >
                                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" class="product-img" alt="product images" height="200" width="200">
                              </a>
                </div>
                <div class="content">
                    <div class="product-name"><a  class="black-text" href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></div>
                    <div class="price">PRICE <?php echo $listprice?>/-<span>MRP <del><?php echo $listmrp ?></del>/-</span></div>
                    <a class="btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><input id="qty" type="hidden" value="1">add to cart</a>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>

<!-- featured section ends -->

<!-- newsletter section starts -->

<section class="newsletter indexsection">

    <form action="">
        <h3 class="-text">subscribe for latest updates</h3>
        <input type="email" name="" placeholder="enter your email" id="" class="box">
        <input type="submit" value="subscribe" class="btn">
    </form>

</section>

<!-- newsletter section ends -->

<!-- arrivals section starts  -->

<section class="arrivals indexsection" id="arrivals">

    <h1 class="heading"> <span>featured product</span> </h1>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">
        <?php
							$get_product=get_product($con,4,'','','','','yes');
							foreach($get_product as $list){
                $listprice=$list['price']*18/100+$list['price'];
                $listmrp=$list['mrp']*18/100+$list['mrp'];
							?>
             <a  class="swiper-slide box" href="product.php?id=<?php echo $list['id']?>">
                <div class="image">
                <img  class="product-img" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                <p class="para"><?php echo $list['name']?>......</p>
                </div>
                <div class="content">
                    
                    <div class="price"><h5> <?php echo $listprice?>/-</h5> <span><del class="red-text"><?php echo   $listmrp?></del>/-</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>
                </div>
            </a>
            <?php } ?>
        </div>

    </div>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

        <?php
							$get_product=get_product($con,4,'','','','','','right');
							foreach($get_product as $list){
                $listprice=$list['price']*18/100+$list['price'];
                $listmrp=$list['mrp']*18/100+$list['mrp'];
							?>
             <a  class="swiper-slide box" href="product.php?id=<?php echo $list['id']?>">
                <div class="image">
                <img  class="product-img" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                <p class="para"><?php echo $list['name']?>......</p>
                </div>
                <div class="content">
                    
                    <div class="price"><h5> <?php echo $listprice?>/-</h5> <span><del class="red-text"><?php echo   $listmrp?></del>/-</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>
                </div>
            </a>
            <?php } ?>
        </div>

    </div>

</section>

<!-- arrivals section ends -->

<!-- deal section starts  -->

<section class="deal indexsection">
<?php
$get_product=get_product($con,"1");
?>
      </div>
    <div class="content">
        <h3>deal of the day</h3>
        <h3 class="black-text">HP Pavilion Laptop 15</h3>
        <ul>
          <li>12th Generation Intel® Core™ i5 processor<li>
          <li>Windows 11 Home<li>
          <li>39.6 cm (15.6) diagonal FHD IPS display<li>
          <li>Intel® Iris® Xᵉ Graphics<li>
          <li>16 GB DDR4-3200 MHz RAM (2 x 8 GB)<li>
          <li>512 GB PCIe® NVMe™ M.2 SSD<li>
        </ul>
      
        
        <a href="product.php?id=22" class="btn">shop now</a>
    </div>

    <div class="image">
        <img src="image/deal-img.jpg" alt="">
    </div>

</section>

<!-- deal section ends -->

<!-- blogs section starts  -->

<section class="blogs indexsection" id="blogs">

    <h1 class="heading"> <span>Best offers</span> </h1>

    <div class="swiper blogs-slider">
        <div class="swiper-wrapper">
    <?php
							$get_product=get_product($con,4,'','','','','','','','big');
							foreach($get_product as $list){
                $listprice=$list['price']*18/100+$list['price'];
                $listmrp=$list['mrp']*18/100+$list['mrp'];
							?>

            <div class="swiper-slide box">
                <div class="image">
                <a href="product.php?id=<?php echo $list['id']?>">
                                            <img  class="product-img" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                                        </a>
                </div>
                <div class="content">
                    <div class="product-blog-name"><a class="black-text" href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?>...</a></div>
                    <a  href="product.php?id=<?php echo $list['id']?>" class="btn-shop">Explore</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

</section>


               
    
<!-- footer section starts  -->
<?php require('slide.php') ?>

 
<!-- footer section ends -->

<!-- loader  -->

<!-- <div class="loader-container">
    <img src="image/loder.gif" alt="">
</div>  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script>
    searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
  searchForm.classList.toggle('active');
}

let loginForm = document.querySelector('.login-form-container');

document.querySelector('#login-btn').onclick = () =>{
  loginForm.classList.toggle('active');
}

document.querySelector('#close-login-btn').onclick = () =>{
  loginForm.classList.remove('active');
}

// window.onscroll = () =>{

//   searchForm.classList.remove('active');

//   if(window.scrollY > 80){
//     document.querySelector('.header .header-2').classList.add('active');
//   }else{
//     document.querySelector('.header .header-2').classList.remove('active');
//   }

// }

window.onload = () =>{

  if(window.scrollY > 80){
    document.querySelector('.topnavbar .header-2').classList.add('active');
  }else{
    document.querySelector('.topnavbar .header-2').classList.remove('active');
  }

  fadeOut();
  
  }

function loader(){
  document.querySelector('.loader-container').classList.add('active');
}

function fadeOut(){
  setTimeout(loader, 4000);
}

var swiper = new Swiper(".laptops-slider", {
  loop:true,
  centeredSlides: true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 2,
    },
  },
});

var swiper = new Swiper(".featured-slider", {
  spaceBetween: 10,
  loop:true,
  centeredSlides: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    450: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".arrivals-slider", {
  spaceBetween: 10,
  loop:true,
  centeredSlides: true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".reviews-slider", {
  spaceBetween: 10,
  grabCursor:true,
  loop:true,
  centeredSlides: true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".blogs-slider", {
  spaceBetween: 10,
  grabCursor:true,
  loop:true,
  centeredSlides: true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});
</script>
<?php require('footer.php') ?>