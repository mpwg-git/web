<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 09:46:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegf5ETc" */ ?>
<?php /*%%SmartyHeaderCode:21748820055b73362c520c2-85220512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c94a893824b6312ef3ac04fbeb4b133fde9d404a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegf5ETc',
      1 => 1438069602,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21748820055b73362c520c2-85220512',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_jsWrapperV2')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapperV2.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
   
   <?php echo smarty_function_xr_atom(array('a_id'=>647,'return'=>1),$_smarty_tpl);?>

   
	<body>
        
        <!-- HEADER ATOM -->
        <?php $_smarty_tpl->tpl_vars['headerAtom'] = new Smarty_variable(642, null, null);?>
        
        <?php if ($_smarty_tpl->getVariable('P_ID')->value==4){?>
            <?php $_smarty_tpl->tpl_vars['headerAtom'] = new Smarty_variable(690, null, null);?>
        <?php }?>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('headerAtom')->value,'return'=>1),$_smarty_tpl);?>


        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        
         <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<!-- Bootstrap core JavaScript -->
        <?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'97,93,77,177,51,48,181,328,75','var'=>"packedjs"),$_smarty_tpl);?>

	</body>
</html>
