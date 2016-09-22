<?php /* Smarty version Smarty-3.0.7, created on 2016-08-17 16:03:05
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewgw6QS" */ ?>
<?php /*%%SmartyHeaderCode:118263826157b46e995fde68-89396555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b5579ab4bb3a729af13309e498a6ebe547ea5c6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewgw6QS',
      1 => 1471442585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118263826157b46e995fde68-89396555',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php if ($_smarty_tpl->getVariable('dataViaAjax')->value){?>
    <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable($_smarty_tpl->getVariable('dataViaAjax')->value, null, null);?>
<?php }else{ ?>
<?php }?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_presse::get_categories_keyed','var'=>'categories'),$_smarty_tpl);?>


<div id="presse-page" class="presse-page default-container-paddingtop">
	<h1>Presse-Page</h1>
</div>