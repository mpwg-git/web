<?php /* Smarty version Smarty-3.0.7, created on 2015-08-15 17:09:02
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXzrD7j" */ ?>
<?php /*%%SmartyHeaderCode:91904926555cf560e315c74-74343202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd016c7d9747079916526b6fbd925eee6ac4546e1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXzrD7j',
      1 => 1439651342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91904926555cf560e315c74-74343202',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Adresse?"),$_smarty_tpl);?>
*</label>
     <div class="input-icon search-input small v-center">
        <input class="form-control" name="ADRESSE" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ADRESSE'];?>
" placeholder="Stadt, Ort, PLZ?">
        <span class="icon-Map">
		    <span class="path1"></span><span class="path2"></span>
		</span>
	</div>
</div>

<?php echo smarty_function_xr_atom(array('a_id'=>764,'return'=>1),$_smarty_tpl);?>
