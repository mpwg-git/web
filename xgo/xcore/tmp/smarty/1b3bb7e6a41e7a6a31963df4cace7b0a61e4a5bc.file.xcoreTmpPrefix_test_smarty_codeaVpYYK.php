<?php /* Smarty version Smarty-3.0.7, created on 2017-02-09 13:02:48
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaVpYYK" */ ?>
<?php /*%%SmartyHeaderCode:303531906589c5a68e11598-39909216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b3bb7e6a41e7a6a31963df4cace7b0a61e4a5bc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaVpYYK',
      1 => 1486641768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '303531906589c5a68e11598-39909216',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style>
    /* Carousel base class */
.carousel {
  height: auto;
  margin-bottom: 6rem;
}
/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  z-index: 10;
}

/* Declare heights because of positioning of img element */
.carousel .item {
  height: auto;
  background-color: #777;
}
.carousel-caption { top: 25%; }
.carousel-inner {
    overflow: visible;
}
.carousel-indicators {
    max-width: 1.2rem;
    height: 6.25%;
    left: 95%;
    top: 50%;
    margin: 0;
    padding: 0;
    
}

.carousel-indicators li {
    display: block;
    width: 1rem;
    height: 1rem;
    text-indent: -999px;
    cursor: pointer;
    background-color: #fff;
    border: 0.1rem solid #04e0d7;
    border-radius: 1rem;
}
.carousel-indicators .active {
    width: 1.2em;
    height: 1.2rem;
    margin: 0px;
    background-color: #04e0d7;
}
.carousel-indicators li:first-child {
    margin-bottom: 1rem;
}
.carousel-indicators li:last-child {
    margin-top: 1rem;
}


.carousel-inner>.item>img, .carousel-inner>.item>a>img {
display: block;
height: auto;
max-width: 100%;
line-height: 1;
width: 100%; // Add this
}
</style>

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="first-slide" src="/xstorage/template/img/redesign/fp-slider/fp-slide-1.jpg" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Example headline.</h1>
          <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
        </div>
      </div>
    </div>
    <div class="item">
      <img class="second-slide" src="/xstorage/template/img/redesign/fp-slider/fp-slide-2.jpg" alt="Second slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Another example headline.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="item">
      <img class="third-slide" src="/xstorage/template/img/redesign/fp-slider/fp-slide-3.jpg" alt="Third slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>One more for good measure.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
        </div>
      </div>
    </div>
  </div>
  <!--
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  -->
</div><!-- /.carousel -->

<script>
    $(document).ready(function() {      
        $('.carousel').carousel('pause');
    });
</script>


