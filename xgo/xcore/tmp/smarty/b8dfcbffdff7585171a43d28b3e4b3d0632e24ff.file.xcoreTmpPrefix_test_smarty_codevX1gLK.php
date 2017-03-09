<?php /* Smarty version Smarty-3.0.7, created on 2017-02-19 17:50:58
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevX1gLK" */ ?>
<?php /*%%SmartyHeaderCode:117932465358a9ccf27caca0-22379335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8dfcbffdff7585171a43d28b3e4b3d0632e24ff' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevX1gLK',
      1 => 1487523058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117932465358a9ccf27caca0-22379335',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_changeLang')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_changeLang.php';
?><div id="main-header" class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-xs-8" style="margin-right: -15px;">
            <div class="header-logo">
                <img class="icon-duck" src="/xstorage/template/redesign/svg/icon-duck-white.svg" alt="Icon" />
            </div>
        </div>
        <!--<div class="col-md-4">-->
        <!--    <button type="button" class="btn btn-default btn-login">Login</button>-->
        <!--</div>-->
        <div class="col-md-6 hidden-xs">
            <button type="button" class="btn btn-default btn-login">Login</button>
            <span>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?> active<?php }?>">DE&nbsp;</a><span class="navlinks">|</span>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='en'){?> active<?php }?>">EN</a>
            </span>
        </div>
        <div class="col-xs-2 hidden-md hidden-lg no-gutter login">
            <button type="button" class="btn btn-default btn-login">Login</button>
        </div>
        <div class="col-xs-2 hidden-md hidden-lg no-gutter nav-lang">
            <span>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?> active<?php }?>">DE&nbsp;</a><span class="navlinks">|</span>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='en'){?> active<?php }?>">EN</a>
            </span>
            <!--
            <ul class='nav navbar-nav navbar-right'>
                <li><a href="/de/start" class="navlinks active">DE</a></li>
                <li><a href="/en/start" class="navlinks">EN</a></li>
            </ul>
            -->
        </div>
    </div>
</div>
