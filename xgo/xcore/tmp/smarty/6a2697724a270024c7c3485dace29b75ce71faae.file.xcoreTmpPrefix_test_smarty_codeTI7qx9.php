<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 22:58:33
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTI7qx9" */ ?>
<?php /*%%SmartyHeaderCode:6927412454fe178940c737-42601353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a2697724a270024c7c3485dace29b75ce71faae' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTI7qx9',
      1 => 1425938313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6927412454fe178940c737-42601353',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_pager')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_pager.php';
if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php echo smarty_function_xr_pager(array('settings'=>$_smarty_tpl->getVariable('settings')->value,'rel_id'=>$_smarty_tpl->getVariable('as_id')->value,'rel_f_id'=>1,'rel_fas_id'=>$_smarty_tpl->getVariable('fas_id')->value,'var'=>'pager_html'),$_smarty_tpl);?>


<div id='PAGER_REPLACE'>
	<div class="row">
		<div class="col-sm-12">
			
			
			<?php echo $_smarty_tpl->getVariable('pager_html')->value;?>

			
			
			<div class='pager_add_record_form' id="pager_add_record_form_<?php echo $_smarty_tpl->getVariable('fas_id')->value;?>
">
			
			<?php echo smarty_function_xr_form(array('f_id'=>5),$_smarty_tpl);?>

			
			</div>
			
          
            <button type="button" data-add_record_div='pager_add_record_form_<?php echo $_smarty_tpl->getVariable('fas_id')->value;?>
' class="pager_add_record btn btn-primary">add record</button>
            
			</div>
		</div>
	</div>
</div>
