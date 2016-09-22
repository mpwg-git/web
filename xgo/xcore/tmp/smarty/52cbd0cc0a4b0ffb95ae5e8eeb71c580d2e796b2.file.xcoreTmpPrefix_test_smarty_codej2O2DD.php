<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 09:53:16
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codej2O2DD" */ ?>
<?php /*%%SmartyHeaderCode:100425316954feb0fc843249-78336061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52cbd0cc0a4b0ffb95ae5e8eeb71c580d2e796b2' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codej2O2DD',
      1 => 1425977596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100425316954feb0fc843249-78336061',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_pager')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_pager.php';
if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?>

<?php echo smarty_function_xr_pager(array('settings'=>$_smarty_tpl->getVariable('settings')->value,'rel_id'=>$_smarty_tpl->getVariable('as_id')->value,'rel_f_id'=>1,'rel_fas_id'=>$_smarty_tpl->getVariable('fas_id')->value,'var'=>'pager_html'),$_smarty_tpl);?>

<?php echo smarty_function_xr_form(array('form_id'=>$_smarty_tpl->getVariable('settings')->value['RAW']['wz_RECORD_EDIT_F_ID'],'submit_txt'=>'Speichern','var'=>'form','rel_f_id'=>1,'rel_fas_id'=>$_smarty_tpl->getVariable('fas_id')->value),$_smarty_tpl);?>


<div id='PAGER_REPLACE'>
	<div class="row">
		<div class="col-sm-12">
			
			
			<?php echo $_smarty_tpl->getVariable('pager_html')->value;?>

			
			
			<div class='pager_add_record_form' id="pager_add_record_form_<?php echo $_smarty_tpl->getVariable('fas_id')->value;?>
" style='background-color:lightgreen;'>
                
                <?php echo $_smarty_tpl->getVariable('html')->value;?>

                
			</div>
			
          
            <button type="button" data-add_record_div='pager_add_record_form_<?php echo $_smarty_tpl->getVariable('fas_id')->value;?>
' class="pager_add_record btn btn-primary">add record</button>
            
			</div>
		</div>
	</div>
</div>
