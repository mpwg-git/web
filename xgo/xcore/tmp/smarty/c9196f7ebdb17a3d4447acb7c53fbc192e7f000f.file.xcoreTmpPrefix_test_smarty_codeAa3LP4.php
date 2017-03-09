<?php /* Smarty version Smarty-3.0.7, created on 2017-02-19 22:55:06
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAa3LP4" */ ?>
<?php /*%%SmartyHeaderCode:54696375358aa143a127dd4-24135487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9196f7ebdb17a3d4447acb7c53fbc192e7f000f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAa3LP4',
      1 => 1487541306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54696375358aa143a127dd4-24135487',
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
</div>