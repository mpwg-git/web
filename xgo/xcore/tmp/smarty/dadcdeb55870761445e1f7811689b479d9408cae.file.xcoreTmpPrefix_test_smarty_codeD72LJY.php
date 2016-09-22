<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 22:55:04
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeD72LJY" */ ?>
<?php /*%%SmartyHeaderCode:120823748254fe16b8093702-69166096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dadcdeb55870761445e1f7811689b479d9408cae' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeD72LJY',
      1 => 1425938104,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120823748254fe16b8093702-69166096',
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

			
			
			<div class='pager_add_record_form'>
			
			</div>
			
          
            <button type="button" class="pager_add_record btn btn-primary">add record</button>
            
			</div>
		</div>
	</div>
</div>
