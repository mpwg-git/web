<?php /* Smarty version Smarty-3.0.7, created on 2017-02-08 18:56:01
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4DSKap" */ ?>
<?php /*%%SmartyHeaderCode:854221377589b5bb1d435c1-66715941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f82c545be4cb7dd72b02aacc51c4539b23ecd205' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4DSKap',
      1 => 1486576561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '854221377589b5bb1d435c1-66715941',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">

    <!-- BODY -->
	<body>
	    <!-- HEADER ATOM -->
        <?php echo smarty_function_xr_atom(array('a_id'=>642,'return'=>1),$_smarty_tpl);?>

        
        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        
        <?php echo smarty_function_xr_atom(array('a_id'=>794,'return'=>1,'desc'=>'face in use'),$_smarty_tpl);?>


        
    </body>
</html>