<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 19:36:33
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0V1afD" */ ?>
<?php /*%%SmartyHeaderCode:117333682354fde831d245f3-60581868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9fcb4c56603e171c89b2ae0d4cfa1a98a5afec1' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0V1afD',
      1 => 1425926193,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117333682354fde831d245f3-60581868',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_pager')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_pager.php';
?><?php echo smarty_function_xr_pager(array('settings'=>$_smarty_tpl->getVariable('settings')->value,'rel_id'=>$_smarty_tpl->getVariable('as_id')->value,'key'=>1),$_smarty_tpl);?>


<div id='PAGER_REPLACE'>
	<div class="row">
		<div class="col-sm-12">
			
			<?php echo $_smarty_tpl->getVariable('pagerdata')->value;?>

            
			</div>
		</div>
	</div>
</div>
