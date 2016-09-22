<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 19:37:19
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2F06sb" */ ?>
<?php /*%%SmartyHeaderCode:100518244854fde85fd57050-62299148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d14fcdf1e9cd1b79c5f00d5cfde6008a90c8002' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2F06sb',
      1 => 1425926239,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100518244854fde85fd57050-62299148',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_pager')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_pager.php';
?><?php echo smarty_function_xr_pager(array('settings'=>$_smarty_tpl->getVariable('settings')->value,'rel_id'=>$_smarty_tpl->getVariable('as_id')->value,'rel_f_id'=>1),$_smarty_tpl);?>


<div id='PAGER_REPLACE'>
	<div class="row">
		<div class="col-sm-12">
			
			<?php echo $_smarty_tpl->getVariable('pagerdata')->value;?>

            
			</div>
		</div>
	</div>
</div>
