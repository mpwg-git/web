<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 20:59:46
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeBVjGs" */ ?>
<?php /*%%SmartyHeaderCode:175298420054fdfbb2054441-58643436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e70486307ecce64e984b9625511dbf200fc7d2e' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeBVjGs',
      1 => 1425931186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175298420054fdfbb2054441-58643436',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_pager')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_pager.php';
?><?php echo smarty_function_xr_pager(array('settings'=>$_smarty_tpl->getVariable('settings')->value,'rel_id'=>$_smarty_tpl->getVariable('as_id')->value,'rel_f_id'=>1,'var'=>'pager_html'),$_smarty_tpl);?>


<div id='PAGER_REPLACE'>
	<div class="row">
		<div class="col-sm-12">
			
			<?php echo $_smarty_tpl->getVariable('pager_html')->value;?>

            
			</div>
		</div>
	</div>
</div>
