<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 22:23:56
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFmxjWp" */ ?>
<?php /*%%SmartyHeaderCode:8928433755cbab5c33e542-50552196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '405045bc610d02f19bd6d13a219391e2376e1d65' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFmxjWp',
      1 => 1439411036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8928433755cbab5c33e542-50552196',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>647,'return'=>1),$_smarty_tpl);?>

	
	<body>

        <!-- HEADER ATOM --->
        <?php echo smarty_function_xr_atom(array('a_id'=>642,'return'=>1),$_smarty_tpl);?>


        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        
        <!-- FOOTER ATOM --->
        <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

        
        
	</body>
</html>
