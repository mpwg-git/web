<?php /* Smarty version Smarty-3.0.7, created on 2017-02-19 18:01:57
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebNcugv" */ ?>
<?php /*%%SmartyHeaderCode:83134719158a9cf85990761-72884174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c68348d2585ddf339833c6177595b85e41a02f14' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebNcugv',
      1 => 1487523717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83134719158a9cf85990761-72884174',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_changeLang')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_changeLang.php';
?><div id="main-header" >
    <div class="row">
        <div class="col-md-6 col-xs-8" style="margin-right: -15px;">
            <div class="header-logo">
                <img class="icon-duck" src="/xstorage/template/redesign/svg/icon-duck-white.svg" alt="Icon" />
            </div>
        </div>
        
        <div class="col-md-6 col-xs-4 text-right right-nav">
            <button type="button" class="btn btn-default btn-login">Login</button>
            <span>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?> active<?php }?>">DE&nbsp;</a><span class="navlinks">|</span>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='en'){?> active<?php }?>">EN</a>
            </span>
        </div>
        
        <!--<div class="col-xs-2 hidden-md hidden-lg no-gutter login">-->
        <!--    <button type="button" class="btn btn-default btn-login">Login</button>-->
        <!--</div>-->
        <!--<div class="col-xs-2 hidden-md hidden-lg no-gutter nav-lang">-->
        <!--    <span>-->
        <!--        <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?> active<?php }?>">DE&nbsp;</a><span class="navlinks">|</span>-->
        <!--        <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='en'){?> active<?php }?>">EN</a>-->
        <!--    </span>-->
        <!--</div>-->
    </div>
</div>
