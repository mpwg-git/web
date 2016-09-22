<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 23:46:33
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code648swM" */ ?>
<?php /*%%SmartyHeaderCode:148680175054fe22c9539fb2-40285165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5178b48734dfac88caca4f127441ba1c9f3a4e1' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code648swM',
      1 => 1425941193,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148680175054fe22c9539fb2-40285165',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_pager')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_pager.php';
if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php echo smarty_function_xr_pager(array('settings'=>$_smarty_tpl->getVariable('settings')->value,'rel_id'=>$_smarty_tpl->getVariable('as_id')->value,'rel_f_id'=>1,'rel_fas_id'=>$_smarty_tpl->getVariable('fas_id')->value,'var'=>'pager_html'),$_smarty_tpl);?>


<?php echo smarty_function_xr_form(array('form_id'=>$_smarty_tpl->getVariable('settings')->value['RAW']['wz_RECORD_EDIT_F_ID'],'var'=>'form'),$_smarty_tpl);?>


<div id='PAGER_REPLACE'>
	<div class="row">
		<div class="col-sm-12">
			
			
			<?php echo $_smarty_tpl->getVariable('pager_html')->value;?>

			
			
			<div class='pager_add_record_form' id="pager_add_record_form_<?php echo $_smarty_tpl->getVariable('fas_id')->value;?>
" style='background-color:lightgreen;'>

                <?php echo $_smarty_tpl->getVariable('form')->value;?>
			
			
			
			</div>
			
          
            <button type="button" data-add_record_div='pager_add_record_form_<?php echo $_smarty_tpl->getVariable('fas_id')->value;?>
' class="pager_add_record btn btn-primary">add record</button>
            
			</div>
		</div>
	</div>
</div>
