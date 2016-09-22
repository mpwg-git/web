<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:19:00
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehDNrGc" */ ?>
<?php /*%%SmartyHeaderCode:164753939554f5ed04b771a6-00424260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83740ba2ec077bada78acdd08c80030d15ecd12a' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehDNrGc',
      1 => 1425403140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164753939554f5ed04b771a6-00424260',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group <?php echo $_smarty_tpl->getVariable('field')->value['class'];?>
">
	<div class="checkbox">
		<label>
			<input type="checkbox" name='<?php echo $_smarty_tpl->getVariable('field')->value['name'];?>
'> <?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('field')->value['label']),$_smarty_tpl);?>

		</label>
	</div>
    <div class="clearer"></div>
</div>