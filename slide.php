

<style>
h2{
text-align:center;

}

/* Slider */
.slick-slide {
margin: 0px 20px;
}
.slick-slide img {
width: 100%;
}

.slider{
  height: 150px !important;
}

.slick-list
{
position: relative;
display: block;
overflow: hidden;
margin: 0;
padding: 0;
}
.slick-list:focus
{
outline: none;
}
.slick-list.dragging
{
cursor: pointer;
cursor: hand;
}
.slick-slider .slick-track,
.slick-slider .slick-list
{
-webkit-transform: translate3d(0, 0, 0);
-moz-transform: translate3d(0, 0, 0);
-ms-transform: translate3d(0, 0, 0);
-o-transform: translate3d(0, 0, 0);
transform: translate3d(0, 0, 0);
}
.slick-track
{
position: relative;
top: 0;
left: 0;
display: block;
}
.slick-track:before,
.slick-track:after
{
display: table;
content: '';
}
.slick-track:after
{
clear: both;
}
.slick-loading .slick-track
{
visibility: hidden;
}
.slick-slide
{
display: none;
float: left;
height: 100%;
min-height: 1px;
}
[dir='rtl'] .slick-slide
{
float: right;
}
.slick-slide img
{
display: block;
}
.slick-slide.slick-loading img
{
display: none;
}
.slick-slide.dragging img
{
pointer-events: none;
}
.slick-initialized .slick-slide
{
display: block;
}
.slick-loading .slick-slide
{
visibility: hidden;
}
.slick-vertical .slick-slide
{
display: block;
height: auto;
border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
display: none;
}
</style>
<body>
  


  <!-- HTML -->
  
  <div class="container">
     <h2>Available <b> Brands</b></h2>
  
     <section class="logos-slider slider">
     <div class="slide"><a href="categories.php?id=5&sub_categories=16"><img class="black brands" src="media/cards/apple.png"></a></div>
        <div class="slide"> <a href="categories.php?id=5&sub_categories=14"><img class="black brands" src="media/cards/hp.png"></a></div>
        <div class="slide"> <a href="categories.php?id=5&sub_categories=13"><img class="black brands" src="media/cards/lenovo.png"></a></div>
        <a href="categories.php?id=5&sub_categories=15"> <img class="black brands" src="media/cards/dell.png"></a>
        <a href="categories.php?id=5&sub_categories=17"><img class="black brands" src="media/cards/acer.png"></a>
       
     </section>
 
  </div>
  <!-- HTML-END -->
  
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
 
  <script>
//logo slider

$('.logos-slider').slick({
slidesToShow: 4,
slidesToScroll: 1,
autoplay: true,
autoplaySpeed: 1500,
arrows: false,
dots: false,
pauseOnHover: false,
responsive: [{
breakpoint: 768,
settings: {
slidesToShow: 3
}
}, {
breakpoint: 520,
settings: {
slidesToShow: 3
}
}]
});
  </script>
