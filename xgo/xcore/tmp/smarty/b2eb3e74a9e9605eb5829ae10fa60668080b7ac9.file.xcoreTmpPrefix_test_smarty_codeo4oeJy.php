<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 19:18:05
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeo4oeJy" */ ?>
<?php /*%%SmartyHeaderCode:25526993954fde3dda1dad7-64868003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2eb3e74a9e9605eb5829ae10fa60668080b7ac9' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeo4oeJy',
      1 => 1425925085,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25526993954fde3dda1dad7-64868003',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_pager')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_pager.php';
?><?php echo smarty_function_xr_pager(array('settings'=>$_smarty_tpl->getVariable('settings')->value),$_smarty_tpl);?>


<div id='PAGER_REPLACE'>
	<div class="row">
		<div class="col-sm-12">
			
			<?php echo $_smarty_tpl->getVariable('pagerdata')->value;?>

            
			</div>
		</div>
	</div>
</div>
