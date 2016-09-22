<?php /* Smarty version Smarty-3.0.7, created on 2014-11-14 16:30:07
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehugyWd" */ ?>
<?php /*%%SmartyHeaderCode:159811315054662e0fc16163-75917671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f383e8bf0b5de2d9197811e610c2905fb270dad1' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehugyWd',
      1 => 1415982607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159811315054662e0fc16163-75917671',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_detaillinks::sc_get_buttons','var'=>'buttons'),$_smarty_tpl);?>

<span class="detailprevnextcontainer">
        		   
    <?php if (($_smarty_tpl->getVariable('buttons')->value['BUTTON_PREV']!='')){?>
        <a href="<?php echo $_smarty_tpl->getVariable('buttons')->value['BUTTON_PREV'];?>
" class="but detailbutton_prev">Prev</a>
    <?php }?>
    <?php if (($_smarty_tpl->getVariable('buttons')->value['BUTTON_NEXT']!='')){?>
        <a href="<?php echo $_smarty_tpl->getVariable('buttons')->value['BUTTON_NEXT'];?>
" class="but detailbutton_next">Next</a>
    <?php }?>

</span>