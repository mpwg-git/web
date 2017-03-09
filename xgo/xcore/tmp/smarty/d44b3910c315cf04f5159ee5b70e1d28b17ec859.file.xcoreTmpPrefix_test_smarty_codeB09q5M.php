<?php /* Smarty version Smarty-3.0.7, created on 2017-02-19 17:29:13
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB09q5M" */ ?>
<?php /*%%SmartyHeaderCode:187577854258a9c7d9c5a136-03290305%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd44b3910c315cf04f5159ee5b70e1d28b17ec859' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB09q5M',
      1 => 1487521753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187577854258a9c7d9c5a136-03290305',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><!-- Carousel -->
<div id="frontpage-slider" class="carousel slide" data-ride="carousel" data-interval="6000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#frontpage-slider" data-slide-to="0" class="active"></li>
        <li data-target="#frontpage-slider" data-slide-to="1"></li>
        <li data-target="#frontpage-slider" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
    <!--carousel caption-->
        <?php echo smarty_function_xr_atom(array('a_id'=>951,'return'=>1),$_smarty_tpl);?>

        <div class="item active">
            <img class="first-slide" src="/xstorage/template/img/redesign/fp-slider/fp-slide-1.jpg" alt="First slide">
        </div>
        <div class="item">
            <img class="second-slide" src="/xstorage/template/img/redesign/fp-slider/fp-slide-2.jpg" alt="Second slide">
        </div>
        <div class="item">
            <img class="third-slide" src="/xstorage/template/img/redesign/fp-slider/fp-slide-3.jpg" alt="Third slide">
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>