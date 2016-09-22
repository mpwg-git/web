<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 18:32:58
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2NIm0H" */ ?>
<?php /*%%SmartyHeaderCode:33627564254ff2acaa31809-57386190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82826c4e01c5f6f7964fa25e922f80e4c22ca676' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2NIm0H',
      1 => 1426008778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33627564254ff2acaa31809-57386190',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_pager')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_pager.php';
if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php echo smarty_function_xr_pager(array('settings'=>$_smarty_tpl->getVariable('settings')->value,'rel_id'=>$_smarty_tpl->getVariable('as_id')->value,'rel_f_id'=>1,'rel_fas_id'=>$_smarty_tpl->getVariable('fas_id')->value,'var'=>'pager_html'),$_smarty_tpl);?>

<?php echo smarty_function_xr_form(array('form_id'=>$_smarty_tpl->getVariable('settings')->value['RAW']['wz_RECORD_EDIT_F_ID'],'submit_txt'=>'Speichern','var'=>'form_record_new','rel_f_id'=>1,'rel_fas_id'=>$_smarty_tpl->getVariable('fas_id')->value),$_smarty_tpl);?>


<div id='PAGER_REPLACE'>
	<div class="row">
		<div class="col-sm-12">
			
			
			<?php echo $_smarty_tpl->getVariable('pager_html')->value;?>

			
			
			<div class='pager_add_record_form' id="pager_add_record_form_<?php echo $_smarty_tpl->getVariable('fas_id')->value;?>
" style='background-color:lightgreen;display:none;' data-close_after_save="1">
                <?php echo $_smarty_tpl->getVariable('form_record_new')->value;?>

			</div>
			
          
            <button type="button" data-add_record_div='pager_add_record_form_<?php echo $_smarty_tpl->getVariable('fas_id')->value;?>
' class="pager_add_record btn btn-primary">add record</button>
            
			</div>
		</div>
	</div>
</div>
