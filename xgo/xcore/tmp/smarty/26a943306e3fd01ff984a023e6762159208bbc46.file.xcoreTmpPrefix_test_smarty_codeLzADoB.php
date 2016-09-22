<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 22:51:12
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLzADoB" */ ?>
<?php /*%%SmartyHeaderCode:175783406854fe15d0d61372-48546390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26a943306e3fd01ff984a023e6762159208bbc46' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLzADoB',
      1 => 1425937872,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175783406854fe15d0d61372-48546390',
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

          
            <button type="button" class="pager_add_record btn btn-primary">add record</button>
            
			</div>
		</div>
	</div>
</div>
