<?php
// session_start();

require('include/connection.php');
require('include/functions.php');
require('include/add_to_cart.inc.php');
$wishlist_count = 0;
$cat_res = mysqli_query($con, "select * from categories where status=1 order by categories asc");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
  $cat_arr[] = $row;
}
$sub_cat_res = mysqli_query($con, "select * from sub_categories where status=1 order by sub_categories asc");
$sub_cat_arr = array();
while ($row = mysqli_fetch_assoc($sub_cat_res)) {
  $sub_cat_arr[] = $row;
}


$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();

if (isset($_SESSION['USER_LOGIN'])) {
  $uid = $_SESSION['USER_ID'];

  if (isset($_GET['wishlist_id'])) {
    $wid = get_safe_value($con, $_GET['wishlist_id']);
    mysqli_query($con, "delete from wishlist where id='$wid' and user_id='$uid'");
  }

  $wishlist_count = mysqli_num_rows(mysqli_query($con, "select product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}

$script_name = $_SERVER['SCRIPT_NAME'];
$script_name_arr = explode('/', $script_name);

$mypage = $script_name_arr[count($script_name_arr) - 1];

$meta_title = "Capable Hub";
$meta_desc = "Capable Hub";
$meta_keyword = "Capable Hub";
if ($mypage == 'product.php') {
  $product_id = get_safe_value($con, $_GET['id']);
  $product_meta = mysqli_fetch_assoc(mysqli_query($con, "select * from product where id='$product_id'"));
  $meta_title = $product_meta['meta_title'];
  //$meta_desc=$product_meta['meta_desc'];
  //$meta_keyword=$product_meta['meta_keyword'];
}
if ($mypage == 'contact.php') {
  $meta_title = 'Contact Us';
}
if ($mypage == 'profile.php') {
  $meta_title = 'My Account';
}
if ($mypage == 'categories.php') {
  $meta_title = 'categories';
}

?>
<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>
    <?php echo $meta_title ?>
  </title>
  <meta name="description" content="<?php echo $meta_desc ?>">
  <meta name="keywords" content="<?php echo $meta_keyword ?>">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!-- <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"  media="screen,projection"/> -->
  <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/top.css" media="screen,projection" />
  
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    span.htc__wishlist {
      background: #26a69a;
      border: 2px solid #fff;
      border-radius: 50%;
      color: #fff;
      font-size: 10px;
      font-weight: 600;
      line-height: 15px;
      position: absolute;
      top: 10px;
      right: 10px;
      text-align: center;
      width: 18px;
      height: 18px;
      margin-left: 5px
    }

    .htc-qua {
      color: #000;
    }
  </style>
</head>


<body style="background: rgb(248, 245, 245);">



  <!--Header section start here-->
  <header>
    <div class="wrapper">
      <div class="navbar-fixed">
        <nav class="b-light" id="top">
          <div class="nav-wrapper">
            <a href="#" data-target="mobile-menu" class="sidenav-trigger show-on-large"><i
                class="material-icons white-text">menu</i></a>
            <a href="index.php" class="brand-logo white-text">Capable Hub</a>
            <ul class="right hide-on-med-and-down" id="menu">
              <li>
                <?php if (isset($_SESSION['USER_LOGIN'])) {
                  echo "  <a class='dropdown-trigger btn b-light white-text' href='#' data-target='dropdown1'><i class='material-icons left'>account_circle</i>My Account<i class='material-icons right white-text'>arrow_drop_down</i></a>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content'>
        <li><a class='' href='profile.php'><i class='material-icons '>account_circle</i>My Profile</a></li>
        <li><a class='' href='my_order.php'><i class='material-icons'>receipt</i>Order</a></li>
        <li><a  class='' href='logout.php'><i class='material-icons '>power_settings_new</i>Logout</a></li>
        
        </ul>";

                } else {
                  echo '<a class="white-text" href="login.php">Login/Register</a>';
                }
                ?>
              </li>
              <li><a href="cart.php"><i class="material-icons white-text left">shopping_cart</i><span
                    class="htc__qua badge-cart white-text">
                    <b>
                      <?php echo $totalProduct ?>
                    </b></span></a></li>
              <li><a href="wishlist.php"><i class="material-icons white-text">favorite_border</i><span
                    class="badge-cart htc__wishlist" data-badge-caption="">
                    <?php echo $wishlist_count ?></a></li>
            </ul>
            <ul class="right">
              <li><a href="#" class="nav-mob-a" id="search-icon"><i class="material-icons white-text">search</i></a>
              </li>
              <li class="hide-on-large-only"><a href="cart.php" class="nav-mob-a"><i
                    class="material-icons left white-text">shopping_cart</i><span class="htc__qua badge-cart white-text"
                    data-badge-caption=""><b>
                      <?php echo $totalProduct ?>
                    </b></span></a></li>
              <li class="hide-on-large-only"><a href="wishlist.php" class="nav-mob-a"><i
                    class="material-icons white-text">favorite_border</i><span class="badge-cart htc__wishlist"
                    data-badge-caption="">
                    <?php echo $wishlist_count ?></a></li>
            </ul>

            <form action="search.php" method="get" autocomplete="off">
              <div class="wrap right serch-box-one" id="search-box">
                <div class="searchbox">
                  <input id="search" type="search" name="search_str" class="searchTerm"
                    placeholder="What are you looking for?" autocomplete="off">
                  <label class="label-icon" for="search"><i class="material-icons iconclose"
                      id="close">close</i></label>
                  <button class="searchButton" type="submit"><i class="material-icons iconclose">search</i></button>

                </div>
              </div>
            </form>

        </nav>
      </div>
    </div>
    
    <ul class="sidenav" id="mobile-menu">

      <?php if (isset($_SESSION['USER_LOGIN'])) {
        echo '<li class="b-light white-text">
                      <a href="profile.php" data-target="dropdown-menu" class="white-text left"><i class="material-icons white-text">account_circle</i>My Account</a>
                      <a class="sidenav-close" href="#!"><i class="material-icons white-text no-margin right" id="close">close</i></a>
                    </li>';
      } else {
        echo ' <li class="b-light white-text">
                      <a href="login.php" data-target="dropdown-menu" class="white-text left"><i class="material-icons white-text">account_circle</i>My Account</a>
                      <a class="sidenav-close" href="#!"><i class="material-icons white-text no-margin right" id="close">close</i></a>
                    </li>';
      }
      ?>
      <!-- <a class="sidenav-close" href="#!"><i class="material-icons black-text no-margin right" id="close">close</i></a> -->

      <li><a href="index.php"><i class="material-icons">home</i>Home</a></li>
      <li class="no-padding">
      <li class="no-padding">
        <ul class="collapsible">
          <li>
            <a class="collapsible-header" style="margin-left: 15px;"><i class="material-icons left">list_alt</i> SHOP BY
              CATEGORY</a>
            <div class="collapsible-body">

              <ul>
                <li><a style="margin-left: 15px;" href="categories.php?id=5">Laptop<i
                      class="material-icons left">keyboard_arrow_right</i></a></li>
                <!-- <li><a style="margin-left: 15px;" href="categories.php?id=6">Monitor<i class="material-icons left" >keyboard_arrow_right</i></a></li> -->
                <li><a style="margin-left: 15px;" class="mt-2  modal-trigger" href="#modal1"><b>Monitor</b><i
                      class="material-icons left">keyboard_arrow_right</i></a>
                </li>
                <li><a style="margin-left: 15px;" class="mt-2  modal-trigger" href="#modal1"><b>Processor</b><i
                      class="material-icons left">keyboard_arrow_right</i></a>
                </li>
                <li><a style="margin-left: 15px;" class="mt-2  modal-trigger" href="#modal1"><b>RAM</b><i
                      class="material-icons left">keyboard_arrow_right</i></a>
                </li>
                <li><a style="margin-left: 15px;" class="mt-2  modal-trigger" href="#modal1"><b>Storage</b><i
                      class="material-icons left">keyboard_arrow_right</i></a>
                </li>

                <!-- <li><a style="margin-left: 15px;" href="ram.php?id=9">RAM<i class="material-icons left" >keyboard_arrow_right</i></a></li>
                <li><a  style="margin-left: 15px;" href="categories.php?id=8">Storage<i class="material-icons left" >keyboard_arrow_right</i></a></li> -->

              </ul>
              <?php
              foreach ($cat_arr as $list) {
                ?>

                <?php
              }
              ?>
            </div>
          </li>
        </ul>
      </li>

      <!-- Modal Structure ends-->
      <li class="no-padding">
        <ul class="collapsible">
          <li>
            <a class="collapsible-header" style="margin-left: 15px;"><i class="material-icons left">laptop</i>Brands</a>
            <div class="collapsible-body">

              <?php
              $cat_id = $list['id'];
              $sub_cat_res = mysqli_query($con, "select * from sub_categories where status='1' and categories_id='$cat_id'");
              ?>
              <ul>
                <?php

                ?>
                <li><a style="margin-left: 15px;" href="categories.php?id=5&sub_categories=13">lenovo<i
                      class="material-icons left">keyboard_arrow_right</i></a></li>
                <li><a style="margin-left: 15px;" href="categories.php?id=5&sub_categories=14">HP<i
                      class="material-icons left">keyboard_arrow_right</i></a></li>
                <li><a style="margin-left: 15px;" href="categories.php?id=5&sub_categories=15">Dell<i
                      class="material-icons left">keyboard_arrow_right</i></a></li>
                <li><a style="margin-left: 15px;" href="categories.php?id=5&sub_categories=16">Apple<i
                      class="material-icons left">keyboard_arrow_right</i></a></li>
                <li><a style="margin-left: 15px;" href="categories.php?id=5&sub_categories=17">Acer<i
                      class="material-icons left">keyboard_arrow_right</i></a></li>

              </ul>
            </div>
          </li>
        </ul>
      </li>
      <!-- <li class="no-padding">
        <ul class="collapsible">
          <li>
            <a class="collapsible-header" style="margin-left: 15px;"><i class="material-icons left">folder_open</i>Storage</a>
            <div class="collapsible-body">
           
            <?php
            $cat_id = $list['id'];
            $sub_cat_res = mysqli_query($con, "select * from sub_categories where status='1' and categories_id='$cat_id'");
            ?>
                <ul>											
                <?php

                ?>
                            <li><a style="margin-left: 15px;" href="categories.php?id=8&sub_categories=20">HDD<i class="material-icons left" >keyboard_arrow_right</i></a></li>
                            <li><a style="margin-left: 15px;" href="categories.php?id=8&sub_categories=19">SSD<i class="material-icons left" >keyboard_arrow_right</i></a></li>
                            <li><a style="margin-left: 15px;" href="categories.php?id=8&sub_categories=15">Pendrive<i class="material-icons left" >keyboard_arrow_right</i></a></li>
                          
                  
                        </ul>
                     </div>
          </li>
        </ul>
      </li> -->
      <!-- <li class="no-padding">
        <ul class="collapsible">
          <li>
            <a class="collapsible-header" style="margin-left: 15px;"><i class="material-icons left">memory</i>Processor</a>
            <div class="collapsible-body">
           
            <?php
            $cat_id = $list['id'];
            $sub_cat_res = mysqli_query($con, "select * from sub_categories where status='1' and categories_id='$cat_id'");
            ?>
                <ul>											
                <?php

                ?>
                            <li><a style="margin-left: 15px;" href="dualcore.php?id=10">Dual core<i class="material-icons left" >keyboard_arrow_right</i></a></li>
                            <li><a style="margin-left: 15px;" href="i3.php?id=11">i3 generation<i class="material-icons left" >keyboard_arrow_right</i></a></li>
                            <li><a style="margin-left: 15px;" href="i5.php?id=12">i5 generation<i class="material-icons left" >keyboard_arrow_right</i></a></li>
                            <li><a style="margin-left: 15px;" href="i7.php?id=13">i7 generation<i class="material-icons left" >keyboard_arrow_right</i></a></li>
                            <li><a style="margin-left: 15px;" href="i9.php?id=13">i9 generation<i class="material-icons left" >keyboard_arrow_right</i></a></li>
                            
                           
                          
                  
                        </ul>
                     </div>
          </li>
        </ul>
      </li> -->

      <!-- <li><a href="feature.php"><i class="material-icons">local_offer</i>Today's Deals</a></li> -->
      <hr>
      <li><a href="my_order.php"><i class="material-icons">receipt</i>My Order</a></li>
      <!-- <li><a href="coupons.php"><i class="material-icons">loyalty</i>My Coupons</a></li> -->
      <li><a href="cart.php"><i class="material-icons">shopping_cart</i>My Cart</a></li>
      <li>
        <?php if (isset($_SESSION['USER_LOGIN'])) {
          echo '<a href="wishlist.php"><i class="material-icons">favorite_border</i>My Wishlist</a></li>';
        } else {
          echo '<a href="login.php"><i class="material-icons">favorite_border</i>My Wishlist</a>';
        }
        ?>

        <hr>
      <li><a href="about.php"><i class="material-icons">portrait</i>About</a></li>
      <li><a href="contact.php"><i class="material-icons">contact_mail</i>Contact</a></li>
      <li>
        <?php if (isset($_SESSION['USER_LOGIN'])) {
          echo '<a href="logout.php"><i class="material-icons">power_settings_new</i>Logout</a>';
        } else {
          echo '<a href="login.php"><i class="material-icons">power_settings_new</i>Login/Register</a>';
        }
        ?>
      </li>
      </br>
    </ul>


    <div id="modal1" class="modal">
      <div class="modal-content pt-2">
        <div class="row" id="product-one">
          <div class="col s12">
            <a class="modal-close right"><i class="material-icons">close</i></a>
          </div>
          <!-----Signup form start----->
          <div class="card-action black-text center">
            <h4>Coming Soon</h4>
          </div>
          <div class="card-content center">
            <div id="myalert"></div>
            <h5>This Service is Under Construction</h5>
            <p class="fontpara">Hello friends! We are currently Work our this service.</p>
            <div class=" mt-2 waves-effect waves-light b-light white-text btn btn-block modal-trigger z-depth-4">
              <a class="white-text" href="index.php">Continue Shopping</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <nav class="bottom-navbar">
    <a class="modal-trigger" href="#modal2"><img src="image/lap.png" alt=""></a>
    <!-- <a href="categories.php?id=6"> <img src="image/moni.png" alt=""></a> -->
    <a class="modal-trigger" href="#modal1"> <img src="image/moni.png" alt=""></a>
    <!-- <a href="categories.php?id=8"> <img src="image/sd.png" alt=""></a> -->
    <a class="modal-trigger" href="#modal1"> <img src="image/sd.png" alt=""></a>
    <!-- <a href="categories.php?id=7"> <img src="image/cpuu.png" alt=""></a> -->
    <a class="modal-trigger" href="#modal1"> <img src="image/cpuu.png" alt=""></a>
    <!-- <a href="categories.php?id=9"> <img src="image/ras.png" alt=""></a> -->
    <a class="modal-trigger" href="#modal1"> <img src="image/ras.png" alt=""></a>
  </nav>
  <!--Main content section start here-->
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
            <div class=" mt-2  waves-effect waves-light b-light black-text btn btn-block modal-trigger z-depth-4">
              <a class="black-text" href="categories.php?id=5">Old Laptop</a>
            </div>
            <div class=" mt-2 waves-effect waves-light b-light black-text btn btn-block modal-trigger z-depth-4">
              <a class="black-text" href="categories.php?id=5">New Laptop</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>