<?php /* Smarty version Smarty-3.0.7, created on 2017-02-09 13:15:40
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLqGIit" */ ?>
<?php /*%%SmartyHeaderCode:919458582589c5d6c94a746-77348345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3dea383e4d93febce03427c2ae1b1fa6d0466562' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLqGIit',
      1 => 1486642540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '919458582589c5d6c94a746-77348345',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    <!-- Carousel Caption -->
    <?php echo smarty_function_xr_atom(array('a_id'=>951,'return'=>1),$_smarty_tpl);?>


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
</div><!-- /.carousel -->

<script>
    $(document).ready(function() {      
        $('.carousel').carousel('pause');
    });
</script>


