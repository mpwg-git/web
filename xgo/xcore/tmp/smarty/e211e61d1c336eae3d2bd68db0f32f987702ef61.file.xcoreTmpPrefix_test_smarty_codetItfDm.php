<?php /* Smarty version Smarty-3.0.7, created on 2017-02-21 01:25:13
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetItfDm" */ ?>
<?php /*%%SmartyHeaderCode:46252154458ab88e9d96877-21022902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e211e61d1c336eae3d2bd68db0f32f987702ef61' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetItfDm',
      1 => 1487636713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46252154458ab88e9d96877-21022902',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_changeLang')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_changeLang.php';
?><div id="main-header" class="no-gutter">
    <div class="col-md-1">&nbsp;</div>
        <div class="col-md-5 col-xs-7">
            <div class="header-logo">
                <img class="icon-duck" src="/xstorage/template/redesign/svg/icon-duck-white.svg" alt="Dr Duck" />
                <img class="icon-font" src="/xstorage/template/img/redesign/mpwg-schriftzug.png" alt="Logo" />
            </div>
        </div>
        <!--<div class="no-gutter">-->
            <div class="col-md-5 col-xs-5 text-right no-gutter">
                <a class="btn btn-default btn-login text-uppercase" data-toggle="collapse" href="#anmelden-inner">Login</a>
                <?php echo smarty_function_xr_atom(array('a_id'=>955,'return'=>1),$_smarty_tpl);?>

                <span class="nav-p-lang">
                    <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?> active<?php }?>">DE&nbsp;</a><span class="navlinks">|</span>
                    <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='en'){?> active<?php }?>">EN</a>
                </span>
            </div>
    <div class="col-md-1">&nbsp;</div>
        <!--</div>-->
</div>
