<?php /* Smarty version Smarty-3.0.7, created on 2017-02-09 19:01:31
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeg2hzS3" */ ?>
<?php /*%%SmartyHeaderCode:909986372589cae7bab2f10-88568725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '897a09ecbd429573e95dc2762e9cf79be8ef7093' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeg2hzS3',
      1 => 1486663291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '909986372589cae7bab2f10-88568725',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><!-- Carousel -->
<div id="frontpage-slider" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <!--carousel caption-->
    <?php echo smarty_function_xr_atom(array('a_id'=>951,'return'=>1),$_smarty_tpl);?>

    <div class="item active">
        <img class="first-slide" src="/xstorage/template/img/redesign/fp-slider/fp-slide-1.jpg" alt="First slide">
        <div class="container">
            <div class="carousel-caption">
            </div>
        </div>
    </div>
    <div class="item">
      <img class="second-slide" src="/xstorage/template/img/redesign/fp-slider/fp-slide-2.jpg" alt="Second slide">
        <div class="container">
            <div class="carousel-caption">
            </div>
        </div>
    </div>
    <div class="item">
      <img class="third-slide" src="/xstorage/template/img/redesign/fp-slider/fp-slide-3.jpg" alt="Third slide">
      <div class="container">
            <div class="carousel-caption">
            </div>
        </div>
    </div>
  </div>
</div>




<script>
    $(document).ready(function() {      
        $('.carousel').carousel('pause');
    });
</script>