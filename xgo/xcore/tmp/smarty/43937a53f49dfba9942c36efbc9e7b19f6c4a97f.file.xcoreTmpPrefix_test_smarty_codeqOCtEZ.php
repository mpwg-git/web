<?php /* Smarty version Smarty-3.0.7, created on 2017-02-09 12:33:35
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqOCtEZ" */ ?>
<?php /*%%SmartyHeaderCode:224794707589c538f7ae923-24440423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43937a53f49dfba9942c36efbc9e7b19f6c4a97f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqOCtEZ',
      1 => 1486640015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224794707589c538f7ae923-24440423',
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
  height: 500px;
  background-color: #777;
}
.carousel-inner {
    overflow: visible;
}
.carousel-indicators li {
    display: block;
    width: 1.5rem;
    height: 1.5rem;
    margin: 0.1rem;
    text-indent: -999px;
    cursor: pointer;
    background-color: #fff;
    /*background-color: rgba(0,0,0,0);*/
    border: 0.1rem solid #04e0d7;
    border-radius: 1rem;
}
.carousel-indicators .active {
    width: 1.6rem;
    height: 1.6rem;
    margin: 0px;
    background-color: #04e0d7;
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