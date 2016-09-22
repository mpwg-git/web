<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 16:32:35
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBHsd3N" */ ?>
<?php /*%%SmartyHeaderCode:148143906555030313b00837-08211780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7e88a9593ec061c14c7c90850e8de0335cb9909' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBHsd3N',
      1 => 1426260755,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148143906555030313b00837-08211780',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['kategorie'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['wz_CATEGORY'], null, null);?>
<?php $_smarty_tpl->tpl_vars['kategorien'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['ALSO_LISTED_IN_CATEGORIES'], null, null);?>

<?php echo smarty_function_xr_translate(array('tag'=>'Kategorie'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->getVariable('kategorie')->value;?>


<?php echo smarty_function_xr_translate(array('tag'=>'Weitere Kategorien'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->getVariable('kategorie')->value;?>


