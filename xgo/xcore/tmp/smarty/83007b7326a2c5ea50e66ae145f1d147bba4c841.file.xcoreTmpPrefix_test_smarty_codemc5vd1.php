<?php /* Smarty version Smarty-3.0.7, created on 2016-08-17 16:03:09
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemc5vd1" */ ?>
<?php /*%%SmartyHeaderCode:105780924357b46e9d334951-69117037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83007b7326a2c5ea50e66ae145f1d147bba4c841' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemc5vd1',
      1 => 1471442589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105780924357b46e9d334951-69117037',
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