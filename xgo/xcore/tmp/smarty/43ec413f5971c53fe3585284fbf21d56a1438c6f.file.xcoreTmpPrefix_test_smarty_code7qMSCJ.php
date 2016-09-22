<?php /* Smarty version Smarty-3.0.7, created on 2015-08-28 12:37:46
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7qMSCJ" */ ?>
<?php /*%%SmartyHeaderCode:14854507955e039fac0f0a9-86821676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43ec413f5971c53fe3585284fbf21d56a1438c6f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7qMSCJ',
      1 => 1440758266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14854507955e039fac0f0a9-86821676',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('user')->value),$_smarty_tpl);?>



<div class="geschlecht">
        <label for="female" class="radio">
            <input id="female" type="radio" name="GESCHLECHT" value="F" disabled="disabled" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='F')){?>checked="checked"<?php }?>>
            <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
            <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        </label>
        <label for="male" class="radio">
            <input id="male" type="radio" name="GESCHLECHT" value="M" disabled="disabled" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='M')){?>checked="checked"<?php }?>>
            <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
            <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
        </label>
    </div>