<?php /* Smarty version Smarty-3.0.7, created on 2017-02-19 10:30:04
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLCo7WJ" */ ?>
<?php /*%%SmartyHeaderCode:201723866758a9659c3e0769-80339370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec6640a15fdbecd3be42d61e43c3812ed2b86d46' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLCo7WJ',
      1 => 1487496604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201723866758a9659c3e0769-80339370',
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
        <div class="col-xs-2 hidden-md no-gutter login">
            <button type="button" class="btn btn-default btn-login">Login</button>
        </div>
        <div class="col-xs-2 hidden-md no-gutter nav-lang">
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


