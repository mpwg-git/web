<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 12:17:21
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUvHnwJ" */ ?>
<?php /*%%SmartyHeaderCode:3661073258bfe8415aa6c5-52413721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9fe32f90ce73816927a5e7b4ba7028f9c298a8b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUvHnwJ',
      1 => 1488971841,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3661073258bfe8415aa6c5-52413721',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_changeLang')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_changeLang.php';
?><div id="main-header" class="no-gutter">
    <div class="col-md-1 col-sm-1 hidden-xs">&nbsp;</div>
    <div class="col-md-5 col-sm-5 col-xs-6">
        <div class="header-logo">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
">
                <img class="icon-duck" src="/xstorage/template/redesign/svg/icon-duck-white.svg" alt="Dr Duck" />
                <img class="icon-font" src="/xstorage/template/img/redesign/mpwg-schriftzug.png" alt="Logo" />
            </a>
        </div>
    </div>
    <div class="col-md-5 col-sm-5 col-xs-6 text-right no-gutter">
        <a class="navlinks btn btn-default btn-logout text-uppercase" href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'Abmelden'),$_smarty_tpl);?>
</a>
        <!--<?php echo smarty_function_xr_atom(array('a_id'=>955,'return'=>1),$_smarty_tpl);?>
-->
        <span class="nav-p-lang">
            <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?> active<?php }?>">DE&nbsp;</a><span class="navlinks">|</span>
            <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='en'){?> active<?php }?>">EN</a>
        </span>
    </div>
    <div class="col-md-1 col-sm-1 hidden-xs">&nbsp;</div>
</div>