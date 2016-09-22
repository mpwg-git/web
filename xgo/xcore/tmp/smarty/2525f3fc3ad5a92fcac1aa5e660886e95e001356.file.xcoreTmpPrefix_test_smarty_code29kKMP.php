<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 19:03:10
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code29kKMP" */ ?>
<?php /*%%SmartyHeaderCode:71763704354fde05e3c6e89-63554538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2525f3fc3ad5a92fcac1aa5e660886e95e001356' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code29kKMP',
      1 => 1425924190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71763704354fde05e3c6e89-63554538',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_pager')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_pager.php';
?><div id='PAGER_REPLACE'>
    	<div class="row">
    		<div class="col-sm-12">
    			
    			<?php echo $_smarty_tpl->getVariable('pagerdata')->value;?>

                
    			</div>
    		</div>
    	</div>
	</div>

<?php echo smarty_function_xr_pager(array('settings'=>$_smarty_tpl->getVariable('settings')->value),$_smarty_tpl);?>
