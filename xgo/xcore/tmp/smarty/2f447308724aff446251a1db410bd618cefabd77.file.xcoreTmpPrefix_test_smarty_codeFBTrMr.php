<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:19:07
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFBTrMr" */ ?>
<?php /*%%SmartyHeaderCode:149291136254f5ed0ba6d1b2-57955188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f447308724aff446251a1db410bd618cefabd77' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFBTrMr',
      1 => 1425403147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149291136254f5ed0ba6d1b2-57955188',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group <?php echo $_smarty_tpl->getVariable('field')->value['class'];?>
">
    <label for=""><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('field')->value['label']),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('field')->value['required']!='N'){?>*<?php }?></label>
    <textarea name='<?php echo $_smarty_tpl->getVariable('field')->value['name'];?>
' class="form-control" data-required="<?php echo $_smarty_tpl->getVariable('field')->value['required'];?>
"><?php echo $_smarty_tpl->getVariable('field')->value['value'];?>
</textarea>
    <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field')->value['name'];?>
 required_Y' style='display:none;'>Bitte füllen Sie dieses Feld aus</div>
    <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field')->value['name'];?>
 required_EMAIL' style='display:none;'>Bitte tragen Sie eine E-Mail Adresse ein</div>
    <div class="clearer"></div>
</div>