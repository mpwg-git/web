<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 15:18:54
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAqAR42" */ ?>
<?php /*%%SmartyHeaderCode:12602790455d5d3be8ed4a5-49161207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ff3fc433a3c04bb222011dfc5f7f1af37de74d1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAqAR42',
      1 => 1440076734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12602790455d5d3be8ed4a5-49161207',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Zimmergrösse?"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center">
        <input class="form-control" name="ZIMMERGROESSE_VON" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'m²'),$_smarty_tpl);?>
?" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZIMMERGROESSE_VON'];?>
" />
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center">
        <input class="form-control" name="ZIMMERGROESSE_BIS" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Personen'),$_smarty_tpl);?>
?" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZIMMERGROESSE_BIS'];?>
" />
    </div>
</div>