<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 22:55:25
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFZVfUm" */ ?>
<?php /*%%SmartyHeaderCode:133993747154fe16cde933e6-73088586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3d50e6354a7aded95a751c844437e770c1c580e' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFZVfUm',
      1 => 1425938125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133993747154fe16cde933e6-73088586',
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

			
			
			<div class='pager_add_record_form' id="pager_add_record_form_<?php echo $_smarty_tpl->getVariable('fas_id')->value;?>
">
			
			</div>
			
          
            <button type="button" class="pager_add_record btn btn-primary">add record</button>
            
			</div>
		</div>
	</div>
</div>
