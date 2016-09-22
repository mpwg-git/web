<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 22:21:38
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQWKPlE" */ ?>
<?php /*%%SmartyHeaderCode:153901951554fe0ee2b80713-08350511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b34b7f6d9deeebb207cfcd6d0a914c1e9a5873b' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQWKPlE',
      1 => 1425936098,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153901951554fe0ee2b80713-08350511',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_pager')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_pager.php';
?><?php echo smarty_function_xr_pager(array('settings'=>$_smarty_tpl->getVariable('settings')->value,'rel_id'=>$_smarty_tpl->getVariable('as_id')->value,'rel_f_id'=>1,'rel_fas_id'=>$_smarty_tpl->getVariable('fas_id')->value,'var'=>'pager_html'),$_smarty_tpl);?>


<div id='PAGER_REPLACE'>
	<div class="row">
		<div class="col-sm-12">
			
			<?php echo $_smarty_tpl->getVariable('pager_html')->value;?>

            
			</div>
		</div>
	</div>
</div>
