<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:10:52
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8MZHFR" */ ?>
<?php /*%%SmartyHeaderCode:198710096455d5a7ac7f6607-42908930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dde33a9f9503d95e1710deb645c2fa9a79ac0bd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8MZHFR',
      1 => 1440065452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198710096455d5a7ac7f6607-42908930',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Miete?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <input class="form-control" name="MIETE_VON" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MIETE_VON'];?>
" id="MIETE_VON" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>
 €?" rel="required"  />
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center">
        <input class="form-control" name="MIETE_BIS" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MIETE_BIS'];?>
" id="MIETE_BIS" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
 €?" rel="required" />
    </div>
    
    <div class="error-div" id="MIETE_VON_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Miete(von) angeben"),$_smarty_tpl);?>

    </div>
    <div class="error-div" id="MIETE_BIS_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Miete(bis) angeben"),$_smarty_tpl);?>

    </div>
    
</div>